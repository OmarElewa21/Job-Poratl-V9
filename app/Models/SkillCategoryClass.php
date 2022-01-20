<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillCategoryClass extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'class_id',
        'skill_id',
        'min_score_percentage',
        'max_score_percentage',
        'class_weight_from_skill'
    ];

    public function classes(){
        return $this->hasMany(CategoryClass::class, 'class_id');
    }

    public function skill(){
        return $this->hasOne(Skill::class, 'skill_id');
    }
}
