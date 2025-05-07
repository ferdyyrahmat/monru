<?php

namespace App\Http\Controllers\System\JenisSyarat;

use App\Http\Controllers\Controller;
use App\Models\Syarat\SyaratJenisDp;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SyaratJenisDpController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = SyaratJenisDp::query();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('btn_action', function ($row) {
                    return '<a href="' . route('admin.syarat.dp.edit', $row->id) . '" class="btn btn-sm btn-warning me-2">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteSJD(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns(['btn_action'])
                ->make(true);
        }
    }
    public function create()
    {
        return view('pages.admin.jenisSyarat.syarat.dp.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'syarat' => 'required|string|max:255',
            'alert' => 'required|numeric',
            'action' => 'required|numeric',
        ]);
        // Create a new SyaratDP instance and fill it with the request data
        SyaratJenisDp::create($data);
        // Redirect back with a success message
        return response()->json([
            'success' => true,
            'message' => 'Syarat DP created successfully.',
            'redirect' => route('admin.syarat.index')
        ]);
    }

    public function edit($id)
    {
        $syarat = SyaratJenisDp::find($id);

        return view('pages.admin.jenisSyarat.syarat.dp.edit', compact('syarat'));
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
        $SyaratJenisDp = SyaratJenisDp::findOrFail($id);
        $SyaratJenisDp->delete();

        return response()->json([
            'success' => true,
            'message' => 'Syarat DP deleted successfully.'
        ]);
    }
}
