<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentDetails;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function start_test()
    {
        $auth_id = auth()->user()->id;
        $student_details = StudentDetails::with('user')->where('user_id',$auth_id )->first();

        // $regi
        return view('student.start-test',compact('student_details'));
    }

    public function career_test()
    {
        return view('student.cat-exam');
    }
}
