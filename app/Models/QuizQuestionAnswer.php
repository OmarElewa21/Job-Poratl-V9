<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionAnswer extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'question_id',
        'answer_text',
        'answer_weight',
        'order'
    ];
}
