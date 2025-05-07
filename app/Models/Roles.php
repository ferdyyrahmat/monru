<?php

namespace App\Models;

use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Roles extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;

    protected $guarded;

    public function permission()
    {
        return $this->hasMany(Permissions::class, 'role_id');
    }
}
