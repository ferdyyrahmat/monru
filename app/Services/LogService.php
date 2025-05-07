<?php

namespace App\Services;

use App\Models\Audit_tr;

/**
 * Class LogService.
 */
class LogService
{
    public function handle($data)
    {
        Audit_tr::create([
            'model' => $data['model'],
            'model_id' => $data['model_id'],
            'user_id' => $data['user_id'], // UUID dari user yang melakukan perubahan
            'action' => $data['action'], // Tipe operasi: created, updated, deleted
            'userEmail' => $data['userEmail'] ?? '-', //
            'description' => $data['description'], // Deskripsi perubahan
            'old_data' => $data['old_data'], // Data sebelum perubahan
            'new_data' => $data['new_data'], // Data setelah perubahan
        ]);
    }
}
