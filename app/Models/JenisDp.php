<?php

namespace App\Models;

use App\Models\Syarat\SyaratJenisDp;
use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class JenisDp extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;

    protected $guarded;

    public function syarats()
    {
        return $this->belongsTo(SyaratJenisDp::class, 'id_syarat', 'id');
    }
}
