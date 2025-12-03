<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguagesAptitude extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'question_14',
        'question_15',
        'question_16',
    ];
}
