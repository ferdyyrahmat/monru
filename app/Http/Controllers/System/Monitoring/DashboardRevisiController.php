<?php

namespace App\Http\Controllers\System\Monitoring;

use App\Http\Controllers\Controller;
use App\Models\FormOutstanding;
use App\Models\FormRevisi;
use App\Models\RuanganAlat;
use App\Models\SubDepartment;
use App\Services\LogService;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Log;
use Yajra\DataTables\Facades\DataTables;

class DashboardRevisiController extends Controller
{
    public function getTableData(Request $request)
    {
        if ($request->ajax()) {
            $query = FormRevisi::query()->orderBy('created_at', 'desc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('tgl_pemeriksaan', function ($row) {
                    return $row->tgl_pemeriksaan . ' ' . Carbon::createFromFormat('!m', $row->bulan_pemeriksaan)->format('F') . ' ' . $row->tahun_pemeriksaan;
                })
                ->editColumn('shift_pemeriksaan', function ($row){
                    return 'Shift '. $row->waktu->shift;
                })
                ->editColumn('jam_pemeriksaan', function ($row) {
                    return Carbon::parse($row->waktu->start_time)->format('H:i') . ' - ' . Carbon::parse($row->waktu->end_time)->format('H:i');
                })
                ->editColumn('id_ruangan', function ($row) {
                    return $row->ruangan->area_name;
                })
                ->editColumn('id_pelaksana', function ($row) {
                    return $row->pelaksana->email;
                })
                ->editColumn('id_verifikator', function ($row) {
                    return $row->verifikator->email;
                })
                ->addColumn('dt_status', function ($row) {
                    if ($row->status == 'need_review') {
                        return '<button class="btn btn-sm btn-warning">
                                Need Review
                            </button>';
                    }elseif($row->status == 'rejected') {
                        return '<button class="btn btn-sm btn-danger">
                                Rejected
                            </button>';
                    } elseif ($row->status == 'accepted') {
                        return '<button class="btn btn-sm btn-success">
                                Accepted
                            </button>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-info" onclick="viewData(\'' . $row->id . '\')">
                                <i class="ki-solid ki-magnifier fs-2"></i>
                                View
                            </button>';
                })
                ->rawColumns([
                    'action', 'dt_status'
                ])
                ->make(true);
        }
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $id = $request->input('id');
            if (!$id) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID is required.'
                ]);
            }
            $revisi = FormRevisi::query()
                ->with(['pelaksana' => function ($query) {
                    $query->select('id', 'fullname');
                }])
                ->with(['verifikator' => function ($query) {
                    $query->select('id', 'fullname');
                }])
                ->with(['ruangan' => function ($query) {
                    $query->select('id', 'area_name');
                }])
                ->with(['waktu' => function ($query) {
                    $query->select('id', 'shift');
                }])
                ->where('id', $id)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $revisi
            ]);
        }

        $department = SubDepartment::query()->orderBy('name', 'asc')->get();
        return view('pages.monitoring.dashboard-revisi.index', compact('department'));
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $dataMonitoring = FormRevisi::query()
                // ->with('ruangan')
                ->where('id_ruangan', $request->ruang)
                ->where('bulan_pemeriksaan', $request->f_month)
                ->where('tahun_pemeriksaan', $request->f_year)
                ->get();

            $ruang = RuanganAlat::with('jenisRuangan')->with('jenisDp')->where('id', $request->ruang)->first();

            return response()->json([
                'data' => $ruang,
            ]);
        }

        $dataMonitoring = FormRevisi::query()
            ->where('id_sub_department', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $ruangan = RuanganAlat::query()
            ->where('id_sub_department', $id)
            ->orderBy('area_name', 'asc')
            ->get();

        return view('pages.monitoring.dashboard-revisi.show', compact('dataMonitoring', 'ruangan'));
    }

    public function store(Request $request)
    {
        
    }

    public function approved(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ], 403);
        }

        try {
            DB::beginTransaction();

            $revisi = FormRevisi::findOrFail($id);

            $is_outstanding = FormOutstanding::query()
                ->where('suhu', $revisi->suhu)
                ->where('suhu_min', $revisi->suhu_min)
                ->where('suhu_max', $revisi->suhu_max)
                ->where('rh', $revisi->rh)
                ->where('dp', $revisi->dp)
                ->where('shift_pemeriksaan', $revisi->shift_pemeriksaan)
                ->where('tgl_pemeriksaan', $revisi->tgl_pemeriksaan)
                ->where('bulan_pemeriksaan', $revisi->bulan_pemeriksaan)
                ->where('tahun_pemeriksaan', $revisi->tahun_pemeriksaan)
                ->where('jam_pemeriksaan', $revisi->jam_pemeriksaan)
                ->where('id_ruangan', $revisi->id_ruangan)
                ->where('is_outstanding', $revisi->is_outstanding)
                ->first();

            $revisi->update([
                'status' => 'accepted',
                'is_verified' => true
            ]);
            $logData = [
                'model' => FormRevisi::class,
                'model_id' => $revisi->id,
                'user_id' => auth()->user()->id,
                'userEmail' => auth()->user()->email,
                'action' => 'APPROVED',
                'description' => 'Verifikator telah Approve Data Revisi',
                'new_data' => $revisi->getAttributes(),
                'old_data' => $revisi->getOriginal(),
            ];
            (new LogService)->handle($logData);

            if ($is_outstanding) {
                $is_outstanding->update([
                    'status' => 'rejected',
                    'is_verified' => false
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log error untuk debugging
            Log::error('Error Approved: ' . $th->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Successfully Approved!',
            'redirect' => route('v1.monitoring.revisi.index')
        ]);
    }

    public function rejected(Request $request)
    {
        $id = $request->id;

        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ], 403);
        }

        try {
            DB::beginTransaction();

            $revisi = FormRevisi::findOrFail($id);

            $is_outstanding = FormOutstanding::query()
                ->where('suhu', $revisi->suhu)
                ->where('suhu_min', $revisi->suhu_min)
                ->where('suhu_max', $revisi->suhu_max)
                ->where('rh', $revisi->rh)
                ->where('dp', $revisi->dp)
                ->where('shift_pemeriksaan', $revisi->shift_pemeriksaan)
                ->where('tgl_pemeriksaan', $revisi->tgl_pemeriksaan)
                ->where('bulan_pemeriksaan', $revisi->bulan_pemeriksaan)
                ->where('tahun_pemeriksaan', $revisi->tahun_pemeriksaan)
                ->where('jam_pemeriksaan', $revisi->jam_pemeriksaan)
                ->where('id_ruangan', $revisi->id_ruangan)
                ->where('is_outstanding', $revisi->is_outstanding)
                ->first();

            $revisi->update([
                'status' => 'rejected',
                'is_verified' => false
            ]);
            $logData = [
                'model' => FormRevisi::class,
                'model_id' => $revisi->id,
                'user_id' => auth()->user()->id,
                'userEmail' => auth()->user()->email,
                'action' => 'REJECTED',
                'description' => 'Verifikator telah Reject Data Revisi',
                'new_data' => $revisi->getAttributes(),
                'old_data' => $revisi->getOriginal(),
            ];
            (new LogService)->handle($logData);

            if($is_outstanding){
                $is_outstanding->update([
                    'status' => 'rejected',
                    'is_verified' => false
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            // Log error untuk debugging
            Log::error('Error Rejected: ' . $th->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Rejected Successfully!',
            'redirect' => route('v1.monitoring.revisi.index')
        ]);
    }
}
