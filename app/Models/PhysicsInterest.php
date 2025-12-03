<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicsInterest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'sub_section_id',
        'question_06',
        'question_07',
        'question_08',
    ];
}
