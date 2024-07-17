<?php
namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherOtpAccount extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'otp', 'expires_at'];

    public $timestamps = false;
}

