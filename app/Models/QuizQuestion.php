<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'id',
        'category_id',
        'question_text',
        'is_checkbox',
        'min_answer_weight',
        'max_answer_weight'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($q) {
            $q->answers()->forceDelete();
        });
    }

    public function category(){
        return $this->belongsTo(QuizCategory::class);
    }

    public function answers(){
        return $this->hasMany(QuizQuestionAnswer::class, 'question_id')->orderBy('order');
    }
}
