<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_questions',
        'correct_answers',
        'incorrect_answers',
        'skipped_answers',
        'score',
        'status'
    ];
}
