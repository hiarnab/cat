<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExamController extends Controller
{
    public function start_test()
    {
        $auth_id = auth()->user()->id;
        $student_details = StudentDetails::with('user')->where('user_id', $auth_id)->first();

        $eligible = false;

        if ($student_details) {

            $registeredAt = $student_details->user->created_at;

            if ($registeredAt) {   
                $eligible = $registeredAt->addHours(24)->lte(now());
            }
        }

        return view('student.start-test', compact('student_details', 'eligible'));
    }

    public function career_test()
    {
        $auth_id = auth()->user()->id;

        $student = StudentDetails::where('user_id', $auth_id)->first();

        if (!$student || $student->created_at->diffInHours(now()) < 24) {
            return redirect()->back()->with('error', 'You can start the test only after 24 hours of registration.');
        }
        return view('student.cat-exam');
    }
}
