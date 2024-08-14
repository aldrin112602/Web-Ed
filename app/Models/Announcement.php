<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'grade_handle_id',
        'title',
        'announcement',
        'file_path',
        'created_at',
        'updated_at'
    ];
}
