<?php

namespace App\Models;

use App\Traits\UUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SubDepartment extends Model
{
    use HasFactory, Notifiable, UUIDAsPrimaryKey;

    protected $guarded;

    public function departments()
    {
        return $this->belongsTo(Department::class, 'id_department', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'id_department');
    }
}
