<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Traits\UUIDAsPrimaryKey;
use App\Traits\AuditTrailable;

class FormRevisi extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;
    //
    protected $guarded;
}
