<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_model_id',
        'student_id',
        'teacher_id',
        'grade_handle_id',
        'status',
        'date'
    ];

}
