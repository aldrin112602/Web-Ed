<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class StudentAccount extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'id_number',
        'name',
        'gender',
        'grade',
        'parents_contact_number',
        'username',
        'password',
        'email',
        'role',
        'profile',
        'phone_number'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}