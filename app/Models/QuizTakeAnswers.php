<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTakeAnswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question_id',
        'answer_id',
        'user_id',
        'guest_id',
        'take_number'
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function question(){
        return $this->belongsTo(QuizQuestion::class, 'question_id');
    }

    public function answer(){
        return $this->belongsTo(QuizQuestionAnswer::class, 'answer_id');
    }
}
