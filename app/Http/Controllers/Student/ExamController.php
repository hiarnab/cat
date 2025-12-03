<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function start_test()
    {
        return view('student.start-test');
    }

    public function career_test()
    {
        return view('student.cat-exam');
    }
}
