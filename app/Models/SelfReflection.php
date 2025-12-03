<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfReflection extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'question_29',
        'question_30',
        'question_31',
        'question_32',
    ];
}
