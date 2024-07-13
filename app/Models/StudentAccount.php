<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class StudentAccount extends Authenticatable
{
    use HasFactory, Notifiable;
 
    use HasFactory;
 
    protected $fillable = [
        'id_number',
        'name',
        'gender',
        'strand',
        'section',
        'grade',
        'parents_contact_number',
        'username',
        'password',
        'email',
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