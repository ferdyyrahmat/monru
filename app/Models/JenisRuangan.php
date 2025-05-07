<?php

namespace App\Models;

use App\Models\Syarat\SyaratJenisRuangan;
use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JenisRuangan extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;

    protected $guarded;

    public function syarats(){
        return $this->belongsTo(SyaratJenisRuangan::class, 'id_syarat', 'id');
    }
}
