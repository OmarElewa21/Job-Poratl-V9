<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateQuizScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'quiz_grade',
        'score_percentage'
    ];
}
