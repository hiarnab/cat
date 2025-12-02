<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetails extends Model
{
    protected $fillable = ['user_id','name','address','current_class','school_name','future_stream','mobile','guardian_mobile','guardian_whatsapp'];
    use HasFactory;
}
