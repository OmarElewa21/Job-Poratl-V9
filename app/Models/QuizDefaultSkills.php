<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizDefaultSkills extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'skill_id'
    ];
}
