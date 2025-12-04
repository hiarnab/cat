<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    use HasFactory;
    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'sub_section_id');
    }
}
