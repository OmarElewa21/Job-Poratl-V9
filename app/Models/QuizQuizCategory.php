<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuizCategory extends Model
{
    use HasFactory;

    protected $table = 'quiz_quiz_categories';

    protected $fillable = [
        'quiz_id',
        'category_id',
        'n_questions',
        'min_score',
        'max_score'
    ];
}
