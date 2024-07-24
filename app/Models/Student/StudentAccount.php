<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Message;
use App\Models\StudentImage;
use App\Models\Admin\SubjectModel;

class StudentAccount extends Authenticatable
{
    use HasFactory, Notifiable;

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
        'address',
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

    public function images()
    {
        return $this->hasMany(StudentImage::class, 'student_id');
    }

    // Define the subjects relationship
    public function subjects()
    {
        return $this->belongsToMany(SubjectModel::class, 'student_subjects', 'student_id', 'subject_id');
    }
}
