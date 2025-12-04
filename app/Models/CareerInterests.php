<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerInterests extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'section_id',
        'question_23',
        'question_24',
        'question_25',
    ];
}
