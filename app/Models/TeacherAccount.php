<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class TeacherAccount extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_number',
        'name',
        'gender',
        'role',
        'position',
        'grade_handle',
        'username',
        'password',
        'email',
        'profile',
        'phone_number'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
