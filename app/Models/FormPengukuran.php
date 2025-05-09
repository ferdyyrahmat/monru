<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Traits\UUIDAsPrimaryKey;
use App\Traits\AuditTrailable;

class FormPengukuran extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;
    //
    protected $guarded;

    public function pelaksana()
    {
        return $this->belongsTo(User::class, 'id_pelaksana', 'id');
    }
    public function verifikator()
    {
        return $this->belongsTo(User::class, 'id_verifikator', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(RuanganAlat::class, 'id_ruangan', 'id');
    }
}
