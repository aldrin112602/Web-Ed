<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class GuidanceAccount extends Authenticatable
{
    use HasFactory, Notifiable;
 
    protected $fillable = [
        'id_number',
        'name',
        'gender',
        'username',
        'password',
        'email',
        'position',
        'role',
        'profile',
        'phone_number',
        'address'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
