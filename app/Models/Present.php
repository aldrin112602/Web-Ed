<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'grade_handle_id'
    ];
}
