<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Traits\UUIDAsPrimaryKey;
use App\Traits\AuditTrailable;

class RuanganAlat extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;
    //
    protected $guarded;

    public function subDepartments()
    {
        return $this->belongsTo(SubDepartment::class, 'id_sub_department', 'id');
    }

    public function jenisRuangan()
    {
        return $this->belongsTo(JenisRuangan::class, 'id_jenis_ruangan', 'id');
    }

    public function jenisDp()
    {
        return $this->belongsTo(JenisDp::class, 'id_dp', 'id');
    }
}
