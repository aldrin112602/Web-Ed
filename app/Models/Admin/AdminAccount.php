<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPasswordTrait;
use Illuminate\Support\Facades\Hash;

class AdminAccount extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable, ResetPasswordTrait;

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
        'address',
        'phone_number'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
