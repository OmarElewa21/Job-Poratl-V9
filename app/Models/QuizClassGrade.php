<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizClassGrade extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'quiz_id',
        'class_id',
        'user_id',
        'guest_id',
        'take_number',
        'score',
        'max_score',
        'score_percentage',
        'is_parent_class'
    ];
}
