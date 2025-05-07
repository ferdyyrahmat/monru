<?php

namespace App\Http\Controllers\System\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.department.index');
    }
    public function dt_dept()
    {
        $query = Department::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-sm btn-warning me-2" onclick="editDept(\'' . $row->id . '\')">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteDept(\'' . $row->id . '\')">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255'
        ]);

        Department::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Department created successfully.',
            'redirect' => route('admin.dept.index')
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Department ID is required.'
            ]);
        }
        $department = Department::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $department
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->id_dept;
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Department ID is required.'
            ]);
        }
        $data = request()->validate([
            'name' => 'required|string|max:255'
        ]);

        $department = Department::findOrFail($id);
        $department->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Department updated successfully.',
            'redirect' => route('admin.dept.index')
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Department ID is required.'
            ]);
        }
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'Department deleted successfully.'
        ]);
    }

}
