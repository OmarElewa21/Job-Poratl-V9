<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $fillable = [
        'id',
        'name',
        'description',
        'enable_guests',
        'horizontal_display'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($quiz) {
            $quiz->pivotModels()->delete();
            $quiz->category_ranges()->delete();
            $quiz->signs()->delete();
        });
    }

    public function pivotModels(){
        return $this->hasMany(QuizQuizCategory::class);
    }

    public function quiz_categories(){
        return $this->belongsToMany(
            QuizCategory::class, 'quiz_quiz_categories',
            'quiz_id', 'category_id')->withPivot('n_questions', 'min_score', 'max_score', 'show');
    }

    public function quiz_quiz_categories(){
        return $this->hasMany(QuizQuizCategory::class);
    }

    public function category_ranges(){
        return $this->belongsToMany(
            QuizCategory::class, 'ranges',
            'quiz_id', 'category_id')->withPivot('range_min_val', 'range_max_val', 'rep_sign');
    }

    public function signs(){
        return $this->hasMany(CategoryCombinations::class);
    }


    public function quiz_candidate_takers(){
        return $this->hasMany(QuizTakeAnswers::class)->whereNull('guest_id')->groupBy('user_id');
    }


    public function quiz_guests_takers(){
        return $this->hasMany(QuizTakeAnswers::class)->whereNull('user_id')->groupBy('guest_id');
    }

    public function quiz_grades(){
        return $this->hasMany(QuizGrade::class);
    }

    public function quiz_candidate_grades(){
        return $this->hasMany(QuizGrade::class)->whereNull('guest_id')->groupBy('user_id')->groupBy('take_number');
    }

    public function quiz_guests_grades(){
        return $this->hasMany(QuizGrade::class)->whereNull('user_id')->groupBy('guest_id')->groupBy('take_number');
    }

    public function defaultSkills()
    {
        return $this->belongsToMany(
            Skill::class, QuizDefaultSkills::class,
            'quiz_id', 'skill_id'); 
    }

    public function defaultSkillsPivots()
    {
        return $this->hasMany(QuizDefaultSkills::class, 'quiz_id');
    }
}
