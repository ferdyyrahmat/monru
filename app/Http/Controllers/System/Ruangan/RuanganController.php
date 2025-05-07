<?php

namespace App\Http\Controllers\System\Ruangan;

use App\Http\Controllers\Controller;
use App\Models\JenisDp;
use App\Models\JenisRuangan;
use App\Models\RuanganAlat;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RuanganController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = RuanganAlat::all();

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('id_sub_department', function ($row) {
                    return $row->subDepartments->name;
                })
                ->editColumn('id_jenis_ruangan', function ($row) {
                    return $row->jenisRuangan->name;
                })
                ->editColumn('id_dp', function ($row) {
                    return $row->jenisDp->name;
                })
                ->addColumn('department', function ($row) {
                    return $row->subDepartments->departments->name;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('admin.ruang.edit', $row->id) . '" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteRuang(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns([
                    'department', 
                    'action'
                ])
                ->make(true);
        }
        return view('pages.admin.ruangan.index');
    }

    public function create()
    {
        $department = SubDepartment::all();
        $jenisRuang = JenisRuangan::all();
        $jenisDP = JenisDp::all();

        return view('pages.admin.ruangan.create', compact('department', 'jenisRuang', 'jenisDP'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'area_name' => 'required|string|max:255',
            'room_no' => 'required|integer',
            'no_alat' => 'nullable|string|max:100',
            'manual_ems' => 'required|in:manual,ems',
            'id_sub_department' => 'required|exists:sub_departments,id',
            'id_jenis_ruangan' => 'required|exists:jenis_ruangans,id',
            'id_dp' => 'required|exists:jenis_dps,id',
        ]);

        RuanganAlat::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Ruangan created successfully.',
            'redirect' => route('admin.ruang.index')
        ]);
    }

    public function edit($id)
    {
        $ruangan = RuanganAlat::find($id);

        $department = SubDepartment::all();
        $jenisRuang = JenisRuangan::all();
        $jenisDP = JenisDp::all();

        return view('pages.admin.ruangan.edit', compact('ruangan','department', 'jenisRuang', 'jenisDP'));
    }

    public function update(Request $request, $id)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'ID is required.'
            ]);
        }
        $data = request()->validate([
            'area_name' => 'required|string|max:255',
            'room_no' => 'required|integer',
            'no_alat' => 'nullable|string|max:100',
            'manual_ems' => 'required|in:manual,ems',
            'id_sub_department' => 'required|exists:sub_departments,id',
            'id_jenis_ruangan' => 'required|exists:jenis_ruangans,id',
            'id_dp' => 'required|exists:jenis_dps,id',
        ]);

        $RuangAlat = RuanganAlat::findOrFail($id);
        $RuangAlat->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Ruangan updated successfully.',
            'redirect' => route('admin.ruang.index')
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'ID is required.'
            ]);
        }
        $RuanganAlat = RuanganAlat::findOrFail($id);
        $RuanganAlat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ruangan deleted successfully.'
        ]);
    }
}
