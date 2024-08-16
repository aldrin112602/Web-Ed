<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};
use App\Models\Teacher\TeacherAccount;

class TeacherGradeHandle extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'grade',
        'strand',
        'section'
    ];

    public function teacher()
    {
        return $this->belongsTo(TeacherAccount::class, 'teacher_id');
    }
}
