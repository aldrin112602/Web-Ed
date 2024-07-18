<?php

namespace App\Models\Admin;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class SubjectModel extends Authenticatable
{
    use HasFactory, Notifiable;
 
    protected $fillable = [
        'subject',
        'teacher_id',
        'time'
    ];

}
