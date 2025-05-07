<?php

namespace App\Http\Controllers\System\JenisSyarat;

use App\Http\Controllers\Controller;
use App\Models\Syarat\SyaratJenisRuangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SyaratJenisRuanganController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SyaratJenisRuangan::query();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('admin.syarat.ruang.edit', $row->id) . '" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteSJR(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('pages.admin.jenisSyarat.syarat.ruangan.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'syarat_suhu' => 'required|string|max:255',
            'batas_bawah_suhu_alert' => 'nullable|numeric',
            'batas_bawah_suhu_action' => 'nullable|numeric',
            'batas_atas_suhu_alert' => 'nullable|numeric',
            'batas_atas_suhu_action' => 'nullable|numeric',
            'syarat_rh' => 'required|string|max:255',
            'batas_bawah_rh_alert' => 'nullable|numeric',
            'batas_bawah_rh_action' => 'nullable|numeric',
            'batas_atas_rh_alert' => 'nullable|numeric',
            'batas_atas_rh_action' => 'nullable|numeric',
        ]);

        // Create a new SyaratJenisRuangan instance and fill it with the request data
        SyaratJenisRuangan::create($data);

        // Redirect back with a success message
        return response()->json([
            'success' => true,
            'message' => 'Syarat Ruangan created successfully.',
            'redirect' => route('admin.syarat.index')
        ]);
    }

    public function edit($id)
    {
        $syarat = SyaratJenisRuangan::find($id);

        return view('pages.admin.jenisSyarat.syarat.ruangan.edit', compact('syarat'));
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
        $syaratJenisRuangan = SyaratJenisRuangan::findOrFail($id);
        $syaratJenisRuangan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Syarat Jenis Ruangan deleted successfully.'
        ]);
    }

}
