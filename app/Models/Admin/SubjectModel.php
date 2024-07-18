<?php

namespace App\Models\Admin;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Teacher\TeacherAccount;

class SubjectModel extends Authenticatable
{
    use HasFactory, Notifiable;
 
    protected $fillable = [
        'subject',
        'teacher_id',
        'time'
    ];

    public function teacherAccount()
    {
        return $this->belongsTo(TeacherAccount::class, 'teacher_id');
    }

}
