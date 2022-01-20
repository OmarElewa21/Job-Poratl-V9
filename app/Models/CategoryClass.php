<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'is_negative'
    ];

    public function category(){
        return $this->belongsTo(QuizCategory::class, 'category_id');
    }
}
