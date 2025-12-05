<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningStyle extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        
        'question_id',
        'answer_option',
    ];
}
