<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradingHeader extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'region',
        'grade',
        'strand',
        'section',
        'division',
        'school_name',
        'school_id',
        'school_year',
        'semester',
        'quarter',
        'subject',
        'track',
        'written_work_percentage',
        'performance_task_percentage',
        'quarterly_assessment_percentage'
    ];
}
