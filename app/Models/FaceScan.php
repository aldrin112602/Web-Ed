<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaceScan extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'time',
        'created_at',
        'updated_at'
    ];
}