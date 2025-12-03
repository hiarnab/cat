<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class, 'section_id');
    }

    public function subSections()
    {
        return $this->hasMany(SubSection::class, 'section_id');
    }
}
