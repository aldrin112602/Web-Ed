<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student\StudentAccount;

class StudentHandle extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'teacher_id',
        'grade_handle_id'
    ];

    public function studentAccount()
    {
        return $this->belongsTo(StudentAccount::class, 'id');
    }
}
