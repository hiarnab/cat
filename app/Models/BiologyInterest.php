<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiologyInterest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'sub_section_id',
          'answer_id',
        'question_id',
        'answer_option',
    ];
}
