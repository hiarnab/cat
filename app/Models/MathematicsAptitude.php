<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathematicsAptitude extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'question_01',
        'question_02',
        'question_03',
        'question_04',
        'question_05',
    ];
}
