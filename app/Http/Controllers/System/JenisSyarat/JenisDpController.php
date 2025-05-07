<?php

namespace App\Http\Controllers\System\JenisSyarat;

use App\Http\Controllers\Controller;
use App\Models\JenisDp;
use App\Models\Syarat\SyaratJenisDp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JenisDpController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = JenisDp::query();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('syarat', function ($row) {
                    return optional($row->syarats)->name;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'. route('admin.jenis.dp.edit', $row->id) .'" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteJDP(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns(['syarat', 'action'])
                ->make(true);
        }
    }
    public function create()
    {
        $syarat = SyaratJenisDp::query()->select('id', 'name')->get();

        return view('pages.admin.jenisSyarat.jenis.dp.create', compact('syarat'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'id_syarat' => 'nullable|string|max:255'
        ]);

        JenisDp::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Jenis DP created successfully.',
            'redirect' => route('admin.jenis.ruang.index')
        ]);
    }

    public function edit($id)
    {
        $jenisDp = JenisDp::find($id);
        $syarat = SyaratJenisDp::query()->select('id', 'name')->get();

        return view('pages.admin.jenisSyarat.jenis.dp.edit', compact('jenisDp', 'syarat'));
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

        $JenisDp = JenisDp::findOrFail($id);
        $JenisDp->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Jenis Dp updated successfully.',
            'redirect' => route('admin.jenis.ruang.index')
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
        $Dp = JenisDp::findOrFail($id);
        $Dp->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dp deleted successfully.'
        ]);
    }
}
