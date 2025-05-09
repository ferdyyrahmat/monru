<?php

namespace App\Http\Controllers\System\WaktuUkur;

use App\Http\Controllers\Controller;
use App\Models\WaktuPemeriksaan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WaktuPengukuranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = WaktuPemeriksaan::all();

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('shift', function ($row) {
                    return 'Shift '. $row->shift;
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-sm btn-warning me-2" onclick="editWaktu(\'' . $row->id . '\')">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteWaktu(\'' . $row->id . '\')">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.waktuPengukuran.index');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'shift' => 'required|integer', // Assuming shift is an integer
            'start_time' => 'required|string|max:5', // Format HH:MM
            'end_time' => 'required|string|max:5', // Format HH:MM
        ]);
        // Create a new WaktuPemeriksaan record
        WaktuPemeriksaan::create([
            'shift' => $data['shift'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Waktu Pemeriksaan created successfully.',
            'redirect' => route('admin.waktu.index'), // Adjust the redirect route as necessary
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'ID is required.'
            ]);
        }
        $waktu = WaktuPemeriksaan::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $waktu
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->id_waktu;
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'ID is required.'
            ]);
        }
        $data = request()->validate([
            'shift' => 'required|string|max:255',
            'start_time' => 'required|string|max:5', // Format HH:MM
            'end_time' => 'required|string|max:5', // Format HH:MM
        ]);

        $waktu = WaktuPemeriksaan::findOrFail($id);
        $waktu->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Waktu Pemeriksaan updated successfully.',
            'redirect' => route('admin.waktu.index')
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
        $waktu = WaktuPemeriksaan::findOrFail($id);
        $waktu->delete();

        return response()->json([
            'success' => true,
            'message' => 'Waktu Pemeriksaan deleted successfully.'
        ]);
    }
}
