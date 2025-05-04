<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Traits\UUIDAsPrimaryKey;
use App\Traits\AuditTrailable;

class Line extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey, AuditTrailable;
    //
    protected $guarded;
}
