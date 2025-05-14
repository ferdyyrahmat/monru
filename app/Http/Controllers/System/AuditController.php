<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Audit_tr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Audit_tr::query()->orderBy('created_at', 'Desc');

            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->translatedFormat('l, d M Y H:i');
                })
                ->editColumn('action', function ($row) {
                    return ucwords($row->action) ?? '-';
                })
                ->editColumn('description', function ($row) {
                    return ucwords($row->description) ?? '-';
                })
                ->addColumn('user', function ($row) {
                    $email = optional($row->users)->email;
                    return strtoupper($email ?? $row->userEmail ?? '-');
                })
                ->addColumn('compName', function ($row) {
                    $resultJson = optional($row->users)->result;

                    // Validate that result is a JSON string
                    $resultArray = [];
                    if (!empty($resultJson) && is_string($resultJson)) {
                        $decoded = json_decode($resultJson, true);
                        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                            $resultArray = $decoded;
                        }
                    }

                    return strtoupper($resultArray['CompName'] ?? '-');
                })
                ->rawColumns(['user', 'compName'])
                ->make(true);
        }

        return view("pages.auditTrail.index");
    }

    
    // public function audit_trail_guest(Request $request)
    // {
    //     $dataAudit = Audit_tr::with('users')
    //         ->orderBy('created_at', 'Desc')
    //         ->get();

    //     // Inisialisasi array untuk menyimpan semua perubahan
    //     $allChanges = [];

    //     // Iterasi setiap catatan audit
    //     foreach ($dataAudit as $audit) {
    //         // Periksa apakah new_data dan old_data adalah string sebelum mendekode
    //         $newData = is_string($audit->new_data) ? json_decode($audit->new_data, true) : $audit->new_data;
    //         $oldData = is_string($audit->old_data) ? json_decode($audit->old_data, true) : $audit->old_data;

    //         // Jika newData bukan array, set menjadi array kosong
    //         if (!is_array($newData)) {
    //             $newData = []; // Set newData menjadi array kosong jika bukan array
    //         }

    //         // Jika oldData bukan array, set menjadi null
    //         if (!is_array($oldData)) {
    //             $oldData = null; // Set oldData menjadi null jika bukan array
    //         }

    //         // Hapus field yang tidak ingin ditampilkan dari newData
    //         $fieldsToHideFromNewData = ['user_id', 'role_id', 'model_id', 'line_id', 'password'];
    //         foreach ($fieldsToHideFromNewData as $field) {
    //             unset($newData[$field]);
    //         }

    //         // Hapus created_at dan updated_at dari oldData jika ada
    //         if (is_array($oldData)) {
    //             unset($oldData['created_at']);
    //             unset($oldData['updated_at']);
    //         }

    //         // Inisialisasi array untuk menyimpan perubahan untuk catatan audit saat ini
    //         $changes = [];

    //         // Bandingkan kedua array
    //         foreach ($newData as $key => $newValue) {
    //             // Pastikan oldData adalah array sebelum memeriksa kunci
    //             if (is_array($oldData) && array_key_exists($key, $oldData)) {
    //                 if ($oldData[$key] !== $newValue) {
    //                     $changes[$key] = [
    //                         'old' => $oldData[$key],
    //                         'new' => $newValue,
    //                     ];
    //                 } elseif ($oldData[$key] === $newValue) {
    //                     $changes[$key] = [
    //                         'old' => $oldData[$key],
    //                         'new' => $newValue,
    //                     ];
    //                 }
    //             } else {
    //                 // Jika oldData adalah null, Anda juga dapat menangani kasus ini jika diperlukan
    //                 if ($oldData === null) {
    //                     $changes[$key] = [
    //                         'old' => null,
    //                         'new' => $newValue,
    //                     ];
    //                 }
    //             }
    //         }

    //         // Hanya tambahkan perubahan jika ada
    //         if (!empty($changes)) {
    //             $allChanges[$audit->id] = $changes; // Mengasumsikan `id` adalah pengidentifikasi unik untuk setiap catatan audit
    //         }
    //     }

    //     return view("pages.auditTrail.index", compact('dataAudit', 'allChanges'));
    // }
}
