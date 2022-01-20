<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description',
        'is_first_parent',
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            $category->category_questions()->delete();
            $category->get_parent_relations()->delete();
            $category->sub_categories()->delete();
        });
    }

    /**
     * Scope a query to only include category that has questions
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHasQuestions($q)
    {
        return $q->has('category_questions');
    }

    public function sub_categories(){
        return $this->belongsToMany(
            QuizCategory::class, 'quiz_category_relations',
            'parent_category_id', 'sub_category_id');
    }

    public function get_parent_relations()
    {
        return $this->hasMany(QuizCategoryRelations::class, 'parent_category_id');
    }

    public function parent_category(){
        return $this->belongsToMany(
            QuizCategory::class, 'quiz_category_relations',
            'sub_category_id', 'parent_category_id');
    }

    public function category_questions(){
        return $this->hasMany(QuizQuestion::class, 'category_id');
    }

    public function ranges(){
        return $this->hasMany(Ranges::class, 'category_id');
    }

    public function classes(){
        return $this->hasMany(CategoryClass::class, 'category_id');
    }
}
