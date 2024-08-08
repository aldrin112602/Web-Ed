<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrGenerate extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject_id',
        'teacher_id',
        'qr_code_id',
        'created_at',
        'updated_at'
    ];
}
