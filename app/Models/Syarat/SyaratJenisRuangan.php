<?php

namespace App\Models\Syarat;

use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SyaratJenisRuangan extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;

    protected $guarded;
}
