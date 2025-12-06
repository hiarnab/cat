<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialScienceAptitude extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id',
    'section_id',
    'answer_id',
    'question_id',
    'answer_option',
  ];
  public function answerOption()
  {
    return $this->belongsTo(AnswerOption::class, 'answer_id');
  }
}
