<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrade extends Model
{
    use HasFactory;

    // Specify which columns can be mass-assigned
    protected $fillable = [
        'teacher_id',
        'student_id',
        'grade',
        'strand',
        'section',
        'written_1',
        'written_2',
        'written_3',
        'written_4',
        'written_5',
        'written_6',
        'written_7',
        'written_8',
        'written_9',
        'written_10',
        'task_1',
        'task_2',
        'task_3',
        'task_4',
        'task_5',
        'task_6',
        'task_7',
        'task_8',
        'task_9',
        'task_10',
    ];
}
