<?php

namespace App\Http\Controllers\System\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubDepartmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Department::query();

        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $departments = $query->orderBy('created_at', 'desc')->get();

        $items = $departments->map(function ($dept) {
            return [
                'id' => $dept->id,
                'text' => $dept->name,
            ];
        });

        return response()->json([
            'items' => $items,
            'pagination' => [
                'has_more' => false,
            ],
        ]);
    }

    public function dt_subdept()
    {
        $query = SubDepartment::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('department', function ($row) {
                return $row->departments->name ?? '-';
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-sm btn-warning me-2" onclick="editSubDept(\'' . $row->id . '\')">Edit</a>
                        <button class="btn btn-sm btn-danger" onclick="deleteSubDept(\'' . $row->id . '\')">Delete</button>';
            })
            ->rawColumns(['department', 'action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'id_department' => 'required|exists:departments,id',
        ]);

        SubDepartment::create($data);

        return response()->json([
            'success' => true,
            'message' => 'SubDepartment created successfully.',
            'redirect' => route('admin.dept.index'),
        ]);
    }

    public function edit(Request $request)
    {
        $subdept = SubDepartment::with('department')->findOrFail($request->id);

        return response()->json([
            'data' => [
                'id' => $subdept->id,
                'name' => $subdept->name,
                'id_department' => $subdept->department->id,
                'department_name' => $subdept->department->name,
            ],
        ]);
    }
    public function update(Request $request)
    {
        $id = $request->id_subdept;
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Sub-Department ID is required.'
            ]);
        }
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'id_department' => 'required|exists:departments,id',
        ]);

        $subdepartment = SubDepartment::findOrFail($id);
        $subdepartment->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Sub-Department updated successfully.',
            'redirect' => route('admin.dept.index')
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Department ID is required.'
            ]);
        }
        $subdepartment = SubDepartment::findOrFail($id);
        $subdepartment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sub-Department deleted successfully.'
        ]);
    }
}
