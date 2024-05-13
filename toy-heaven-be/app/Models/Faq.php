<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question_ita',
        'question_eng',
        'answer_ita',
        'answer_eng'
    ];

}

