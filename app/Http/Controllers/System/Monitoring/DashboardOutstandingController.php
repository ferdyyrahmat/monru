<?php

namespace App\Http\Controllers\System\Monitoring;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Models\FormOutstanding;
use App\Models\FormRevisi;
use App\Models\RuanganAlat;
use App\Models\SubDepartment;
use App\Models\User;
use App\Models\WaktuPemeriksaan;
use App\Services\LogService;
use App\Services\VerifyOutstanding;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Log;
use Yajra\DataTables\DataTables;

class DashboardOutstandingController extends Controller
{
    public function getTableData(Request $request)
    {
        if ($request->ajax()) {
            $query = FormOutstanding::query()
                ->where('shift_pemeriksaan', $request->f_shift)
                ->where('id_ruangan', $request->ruang)
                ->where('bulan_pemeriksaan', $request->f_month)
                ->where('tahun_pemeriksaan', $request->f_year)    
                ->orderBy('created_at', 'desc');

            return DataTables::of($query)
                ->editColumn('tgl_pemeriksaan', function ($row) {
                    return $row->tgl_pemeriksaan.' '. Carbon::createFromFormat('!m', $row->bulan_pemeriksaan)->format('F').' '.$row->tahun_pemeriksaan;
                })
                ->editColumn('shift_pemeriksaan', function ($row) {
                    return 'Shift ' . $row->waktu->shift;
                })
                ->editColumn('jam_pemeriksaan', function ($row) {
                    return Carbon::parse($row->waktu->start_time)->format('H:i').' - '.Carbon::parse($row->waktu->end_time)->format('H:i');
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
                    } elseif ($row->status == 'rejected') {
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
                ->addColumn('null', function ($row) {
                    return null;
                })
                ->rawColumns([
                    'action', 'null', 'dt_status'
                ])
                ->make(true);
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id');
            if (!$id) {
                return response()->json([
                    'success' => false,
                    'message' => 'ID is required.'
                ]);
            }
            $outstanding = FormOutstanding::query()
                ->with([
                    'pelaksana' => function ($query) {
                        $query->select('id', 'fullname');
                    }
                ])
                ->with([
                    'verifikator' => function ($query) {
                        $query->select('id', 'fullname');
                    }
                ])
                ->with([
                    'ruangan' => function ($query) {
                        $query->select('id', 'area_name');
                    }
                ])
                ->with([
                    'waktu' => function ($query) {
                        $query->select('id', 'shift');
                    }
                ])
                ->where('id', $id)
                ->get();

            return response()->json([
                'success' => true,
                'data' => $outstanding
            ]);
        }

        $department = SubDepartment::query()->orderBy('name', 'asc')->get();
        return view('pages.monitoring.dashboard-outstanding.index', compact('department'));
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $dataMonitoring = FormOutstanding::query()
                // ->with('ruangan')
                ->where('shift_pemeriksaan', $request->f_shift)
                ->where('id_ruangan', $request->ruang)
                ->where('bulan_pemeriksaan', $request->f_month)
                ->where('tahun_pemeriksaan', $request->f_year)
                ->get();

            $ruang = RuanganAlat::with('jenisRuangan')->with('jenisDp')->where('id', $request->ruang)->first();

            return response()->json([
                'data' => $ruang,
            ]);
        }

        $dataMonitoring = FormOutstanding::query()
            ->where('id_sub_department', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $ruangan = RuanganAlat::query()
            ->where('id_sub_department', $id)
            ->orderBy('area_name', 'asc')
            ->get();
        
        $shift = WaktuPemeriksaan::query()
            ->orderBy('shift')
            ->get();

        return view('pages.monitoring.dashboard-outstanding.show', compact('dataMonitoring', 'ruangan', 'shift'));
    }

    public function approved(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Masukan Email Onekalbe',
            'email.email' => 'Email Tidak Valid',
            'password.required' => 'Masukan Password'
        ]);
        // Membuat array $kredensil langsung
        $kredensil = $request->only('email', 'password');

        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.'
            ], 403);
        }

        $outstanding = FormOutstanding::findOrFail($id);

        $is_revisi = FormRevisi::query()
            ->where('suhu', $outstanding->suhu)
            ->where('suhu_min', $outstanding->suhu_min)
            ->where('suhu_max', $outstanding->suhu_max)
            ->where('rh', $outstanding->rh)
            ->where('dp', $outstanding->dp)
            ->where('shift_pemeriksaan', $outstanding->shift_pemeriksaan)
            ->where('tgl_pemeriksaan', $outstanding->tgl_pemeriksaan)
            ->where('bulan_pemeriksaan', $outstanding->bulan_pemeriksaan)
            ->where('tahun_pemeriksaan', $outstanding->tahun_pemeriksaan)
            ->where('jam_pemeriksaan', $outstanding->jam_pemeriksaan)
            ->where('id_ruangan', $outstanding->id_ruangan)
            ->where('is_outstanding', $outstanding->is_outstanding)
            ->first();


        $logData = [
            'model' => FormOutstanding::class,
            'model_id' => $outstanding->id,
            'user_id' => auth()->user()->id,
            'userEmail' => auth()->user()->email,
            'action' => 'APPROVED',
            'description' => 'Verifikator telah Approve Data Outstanding',
            'new_data' => $outstanding->getAttributes(),
            'old_data' => $outstanding->getOriginal(),
        ];

        $verify = (new VerifyOutstanding)->handle($kredensil, $request, $logData);

        if($verify->isSuccessful()){
            $outstanding->update([
                'status' => 'accepted',
                'is_verified' => true
            ]);

            if ($is_revisi) {
                $is_revisi->update([
                    'status' => 'rejected',
                    'is_verified' => false
                ]);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'User bukan verifikator',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Successfully Approved!',
            'redirect' => route('v1.monitoring.outstanding.index')
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

            $outstanding = FormOutstanding::findOrFail($id);

            $is_revisi = FormRevisi::query()
                ->where('suhu', $outstanding->suhu)
                ->where('suhu_min', $outstanding->suhu_min)
                ->where('suhu_max', $outstanding->suhu_max)
                ->where('rh', $outstanding->rh)
                ->where('dp', $outstanding->dp)
                ->where('shift_pemeriksaan', $outstanding->shift_pemeriksaan)
                ->where('tgl_pemeriksaan', $outstanding->tgl_pemeriksaan)
                ->where('bulan_pemeriksaan', $outstanding->bulan_pemeriksaan)
                ->where('tahun_pemeriksaan', $outstanding->tahun_pemeriksaan)
                ->where('jam_pemeriksaan', $outstanding->jam_pemeriksaan)
                ->where('id_ruangan', $outstanding->id_ruangan)
                ->where('is_outstanding', $outstanding->is_outstanding)
                ->first();

            $outstanding->update([
                'status' => 'rejected',
                'is_verified' => false
            ]);
            $logData = [
                'model' => Formoutstanding::class,
                'model_id' => $outstanding->id,
                'user_id' => auth()->user()->id,
                'userEmail' => auth()->user()->email,
                'action' => 'REJECTED',
                'description' => 'Verifikator telah Reject Data Outstanding',
                'new_data' => $outstanding->getAttributes(),
                'old_data' => $outstanding->getOriginal(),
            ];
            (new LogService)->handle($logData);

            if ($is_revisi) {
                $is_revisi->update([
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
            'redirect' => route('v1.monitoring.outstanding.index')
        ]);
    }
}
