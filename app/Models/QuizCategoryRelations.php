<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizCategoryRelations extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_category_id',
        'sub_category_id'
    ];
}
