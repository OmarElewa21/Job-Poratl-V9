<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizGrade extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'quiz_id',
        'user_id',
        'category_id',
        'category_grade',
        'category_percentage',
        'result_sign',
        'result_text',
        'guest_id',
        'take_number',
        'show'
    ];

    

    public function quiz(){
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    public function category(){
        return $this->belongsTo(QuizCategory::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_id');
    }
}
