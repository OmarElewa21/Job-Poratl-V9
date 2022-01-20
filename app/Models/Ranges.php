<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranges extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'category_id',
        'range_min_val',
        'range_max_val',
        'result_sign',
        'result_text'
    ];
}
