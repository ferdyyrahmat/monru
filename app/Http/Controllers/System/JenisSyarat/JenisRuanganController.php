<?php

namespace App\Http\Controllers\System\JenisSyarat;

use App\Http\Controllers\Controller;
use App\Models\JenisRuangan;
use App\Models\Syarat\SyaratJenisRuangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisRuanganController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $query = JenisRuangan::query();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('syarat', function ($row) {
                    return optional($row->syarats)->name;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'. route('admin.jenis.ruang.edit', $row->id) .'" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteJR(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns(['syarat','action'])
                ->make(true);
        }
        return view('pages.admin.jenisSyarat.jenis.index');
    }

    public function create()
    {
        $syarat = SyaratJenisRuangan::query()->select('id', 'name')->get();

        return view('pages.admin.jenisSyarat.jenis.ruangan.create', compact('syarat'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'id_syarat' => 'nullable|string|max:255'
        ]);

        JenisRuangan::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Ruangan created successfully.',
            'redirect' => route('admin.jenis.ruang.index')
        ]);
    }

    public function edit($id)
    {
        $jenisRuangan = JenisRuangan::find($id);
        // dd($jenisRuangan);
        $syarat = SyaratJenisRuangan::query()->select('id', 'name')->get();

        return view('pages.admin.jenisSyarat.jenis.ruangan.edit', compact('jenisRuangan', 'syarat'));
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
            'name' => 'required|string|max:255',
            'id_syarat' => 'nullable|string|max:255'
        ]);

        $jenisRuangan = JenisRuangan::findOrFail($id);
        $jenisRuangan->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Ruangan updated successfully.',
            'redirect' => route('admin.jenis.ruang.index')
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'jenisRuangan ID is required.'
            ]);
        }
        $jenisRuangan = JenisRuangan::findOrFail($id);
        $jenisRuangan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jenis Ruangan deleted successfully.'
        ]);
    }
}
