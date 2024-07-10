<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class TeacherAccount extends Authenticatable
{
    use HasFactory, Notifiable;
 
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
