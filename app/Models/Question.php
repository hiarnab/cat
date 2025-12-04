<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'sub_section_id',
        'type',
        'question_no',
        'question',
    ];

    // ✅ FIX 1: Explicit foreign key
    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    // ✅ FIX 2: Explicit foreign key
    public function subSection()
    {
        return $this->belongsTo(SubSection::class, 'sub_section_id');
    }

    // ✅ FIX 3: Explicit foreign key
    public function options()
    {
        return $this->hasMany(AnswerOption::class, 'question_id');
    }
}
