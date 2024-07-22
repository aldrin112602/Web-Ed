<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPasswordTrait;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;

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
        'phone_number',
        'extension_name'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }
}
