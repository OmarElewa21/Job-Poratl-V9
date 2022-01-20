<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCombinations extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'category_ids',
        'signs',
        'parent_category_id',
        'result_sign',
        'result_meaning'
    ];
}
