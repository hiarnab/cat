<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use App\Models\StudentDetails;
// use App\Models\MathematicsAptitude;
// use App\Models\PhysicsInterest;
// use App\Models\ChemistryInterest;
// use App\Models\BiologyInterest;
// use App\Models\LanguagesAptitude;
// use App\Models\CommereceAptitude;
// use App\Models\SocialScienceAptitude;
// use App\Models\CareerInterests;
// use App\Models\LearningStyle;
// use App\Models\SelfReflection;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Sections;
use App\Models\AnswerOption;


class ExamController extends Controller
{
    // public function start_test()
    // {
    //     $auth_id = auth()->user()->id;
    //     $student_details = StudentDetails::with('user')->where('user_id', $auth_id)->first();

    //     // $regi
    //     return view('student.start-test', compact('student_details'));
    // }
    // public function start_test()
    // {
    //     $auth_id = auth()->user()->id;
    //     $student_details = StudentDetails::with('user')->where('user_id', $auth_id)->first();

    //     $eligible = false;

    //     if ($student_details) {

    //         $registeredAt = $student_details->user->created_at;

    //         if ($registeredAt) {
    //             $eligible = $registeredAt->addHours(24)->lte(now());
    //             // $eligible = true;
    //         }
    //     }
    //     return $registeredAt;

    //     return view('student.start-test', compact('student_details' , 'eligible'));
    // }


    public function start_test()
    {
        $auth_id = auth()->user()->id;
        $student_details = StudentDetails::with('user')->where('user_id', $auth_id)->first();

        $eligible = false;
        $remainingTime = "00:00:00"; // default

        if ($student_details) {
            $registeredAt = $student_details->user->created_at;

            if ($registeredAt) {
                $availableAt = $registeredAt->addHours(24);
                $now = now();

                // Check if eligible
                $eligible = $now->gte($availableAt);

                // Remaining time in HH:MM:SS
                if (!$eligible) {
                    $diffInSeconds = $availableAt->diffInSeconds($now);
                    $h = floor($diffInSeconds / 3600);
                    $m = floor(($diffInSeconds % 3600) / 60);
                    $s = $diffInSeconds % 60;
                    $remainingTime = sprintf("%02d:%02d:%02d", $h, $m, $s);
                }
            }
        }

        return view('student.start-test', compact('student_details', 'eligible', 'remainingTime'));
    }


    public function career_test()
    {
        $auth_id = auth()->user()->id;

        $student = StudentDetails::where('user_id', $auth_id)->first();

        if (!$student || $student->created_at->diffInHours(now()) < 24) {
            return redirect()->back()->with('error', 'You can start the test only after 24 hours of registration.');
        }
        // return view('student.cat-exam');

        $sections = Sections::with([
            'subSections.questions.options',
            'questions.options'
        ])->get();

        $questions = [];

        foreach ($sections as $section) {

            $sectionTitle = 'Section ' . $section->id . ': ' . $section->name;
            $questions[$sectionTitle] = [];

            // ✅ DIRECT QUESTIONS (WITHOUT SUB-SECTION)
            foreach ($section->questions->whereNull('sub_section_id') as $q) {
                $questions[$sectionTitle][] = [
                    'q' => $q->question,
                    'type' => $q->type,
                    'options' => $q->options->map(function ($opt) {
                        return [
                            'id'    => $opt->id,
                            'value' => $opt->option_value,
                        ];
                    })->toArray(),
                ];
            }

            // ✅ QUESTIONS WITH SUB-SECTIONS
            foreach ($section->subSections as $sub) {

                // Sub-section heading
                $questions[$sectionTitle][] = [
                    'sub' => $sub->name
                ];

                foreach ($sub->questions as $q) {
                    $questions[$sectionTitle][] = [
                        'q' => $q->question,
                        'type' => $q->type,
                        'options' => $q->options->map(function ($opt) {
                            return [
                                'id'    => $opt->id,
                                'value' => $opt->option_value,
                            ];
                        })->toArray(),
                    ];
                }
            }
        }

        // return $questions;
        // ✅ ONLY RETURN THE VIEW
        return view('student.cat-exam', compact('questions'));
    }
    // public function career_test_submit(Request $request)
    // {


    //     $studentId = auth()->user()->id;
    //     // return $studentId;
    //     return $request->all();
    //     $mathAptitude = new MathematicsAptitude(); 
    //     $mathAptitude->user_id = $studentId;
    //     $mathAptitude->section_id = 1;
    //     $mathAptitude->quetion_id = 1;
    //     // $mathAptitude->answer_option = $request->1;

    // }
    // public function career_test_submit(Request $request)
    // {
    //     $studentId = auth()->user()->id;
    //     return $request->all();

    //     // MAPPING OF QUESTION RANGES → TABLE + SECTION + SUB-SECTION
    //     $mapping = [
    //         // Mathematics Aptitude (Q1–5)
    //         ['start' => 1, 'end' => 5, 'table' => 'MathematicsAptitude', 'section' => 1, 'sub' => null],

    //         // Physics Interest (Q6–8)
    //         ['start' => 6, 'end' => 8, 'table' => 'PhysicsInterest', 'section' => 2, 'sub' => 1],

    //         // Chemistry Interest (Q9–10)
    //         ['start' => 9, 'end' => 10, 'table' => 'ChemistryInterest', 'section' => 2, 'sub' => 2],

    //         // Biology Interest (Q11–13)
    //         ['start' => 11, 'end' => 13, 'table' => 'BiologyInterest', 'section' => 2, 'sub' => 3],
    //         // Languages Aptitude (Q14–16)
    //         ['start' => 14, 'end' => 16, 'table' => 'LanguagesAptitude', 'section' => 3, 'sub' => null],
    //         // Commerce Aptitude (Q17–19)
    //         ['start' => 17, 'end' => 19, 'table' => 'CommereceAptitude', 'section' => 4, 'sub' => null],
    //         // Social Sciences Aptitude (Q20–22)
    //         ['start' => 20, 'end' => 22, 'table' => 'SocialScienceAptitude', 'section' => 5, 'sub' => null],
    //         // Career Interests (Q23–25)
    //         ['start' => 23, 'end' => 25, 'table' => 'CareerInterests', 'section' => 6, 'sub' => null],
    //         // Learning Style (Q26–28)
    //         ['start' => 26, 'end' => 28, 'table' => 'LearningStyle', 'section' => 7, 'sub' => null],
    //         // Self-Reflection (Q29–32)
    //         ['start' => 29, 'end' => 32, 'table' => 'SelfReflection', 'section' => 8, 'sub' => null],
    //     ];

    //     // LOOP THROUGH ALL FORM INPUT
    //     foreach ($request->all() as $questionId => $answer) {

    //         if (!is_numeric($questionId)) continue;      // Skip hidden fields
    //         if ($answer === null || $answer === "") continue; // Skip empty answers

    //         foreach ($mapping as $map) {

    //             // CHECK WHICH RANGE THE QUESTION BELONGS TO
    //             if ($questionId >= $map['start'] && $questionId <= $map['end']) {

    //                 $model = "App\\Models\\" . $map['table'];

    //                 // SAVE ANSWER
    //                 $model::create([
    //                     'user_id'       => $studentId,
    //                     'section_id'    => $map['section'],
    //                     'sub_section_id' => $map['sub'],
    //                     'question_id'   => $questionId,
    //                     'answer_option' => is_array($answer) ? json_encode($answer) : $answer,
    //                 ]);
    //             }
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Your test has been submitted successfully!');
    // }
    // public function career_test_submit(Request $request)
    // {
    //     return $request->all();
    //     $studentId = auth()->user()->id;

    //     $mapping = [
    //         ['start' => 1, 'end' => 5, 'table' => 'MathematicsAptitude', 'section' => 1, 'sub' => null],
    //         ['start' => 6, 'end' => 8, 'table' => 'PhysicsInterest', 'section' => 2, 'sub' => 1],
    //         ['start' => 9, 'end' => 10, 'table' => 'ChemistryInterest', 'section' => 2, 'sub' => 2],
    //         ['start' => 11, 'end' => 13, 'table' => 'BiologyInterest', 'section' => 2, 'sub' => 3],
    //         ['start' => 14, 'end' => 16, 'table' => 'LanguagesAptitude', 'section' => 3, 'sub' => null],
    //         ['start' => 17, 'end' => 19, 'table' => 'CommereceAptitude', 'section' => 4, 'sub' => null],
    //         ['start' => 20, 'end' => 22, 'table' => 'SocialScienceAptitude', 'section' => 5, 'sub' => null],
    //         ['start' => 23, 'end' => 25, 'table' => 'CareerInterests',    'section' => 6, 'sub' => null],
    //         ['start' => 26, 'end' => 28, 'table' => 'LearningStyle',      'section' => 7, 'sub' => null],
    //         ['start' => 29, 'end' => 32, 'table' => 'SelfReflection',     'section' => 8, 'sub' => null],
    //     ];

    //     foreach ($request->all() as $questionId => $answer) {

    //         if (!is_numeric($questionId)) continue;
    //         if ($answer === null || $answer === "") continue;

    //         foreach ($mapping as $map) {

    //             if ($questionId >= $map['start'] && $questionId <= $map['end']) {

    //                 $model = "App\\Models\\" . $map['table'];

    //                 $model::create([
    //                     'user_id'        => $studentId,
    //                     'section_id'     => $map['section'],
    //                     'sub_section_id' => $map['sub'],
    //                     'question_id'    => $questionId,
    //                     'answer_option'  => is_array($answer) ? json_encode($answer) : $answer,
    //                 ]);
    //             }
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Your test has been submitted successfully!');
    // }
    public function career_test_submit(Request $request)
    {
        $studentId = auth()->user()->id;

        $mapping = [
            ['start' => 1,  'end' => 5,  'table' => 'MathematicsAptitude', 'section' => 1, 'sub' => null],
            ['start' => 6,  'end' => 8,  'table' => 'PhysicsInterest',     'section' => 2, 'sub' => 1],
            ['start' => 9,  'end' => 10, 'table' => 'ChemistryInterest',   'section' => 2, 'sub' => 2],
            ['start' => 11, 'end' => 13, 'table' => 'BiologyInterest',     'section' => 2, 'sub' => 3],
            ['start' => 14, 'end' => 16, 'table' => 'LanguagesAptitude',   'section' => 3, 'sub' => null],
            ['start' => 17, 'end' => 19, 'table' => 'CommereceAptitude',   'section' => 4, 'sub' => null],
            ['start' => 20, 'end' => 22, 'table' => 'SocialScienceAptitude', 'section' => 5, 'sub' => null],
            ['start' => 23, 'end' => 25, 'table' => 'CareerInterests',     'section' => 6, 'sub' => null],
            ['start' => 26, 'end' => 28, 'table' => 'LearningStyle',       'section' => 7, 'sub' => null],
            ['start' => 29, 'end' => 32, 'table' => 'SelfReflection',      'section' => 8, 'sub' => null],
        ];

        foreach ($request->all() as $questionId => $answer) {

            if (!is_numeric($questionId)) continue;
            if ($answer === null || $answer === "") continue;

            foreach ($mapping as $map) {

                if ($questionId >= $map['start'] && $questionId <= $map['end']) {

                    $model = "App\\Models\\" . $map['table'];

                    // ✅ ✅ MCQ — REQUEST VALUE IS answer_options.id
                    if (is_numeric($answer)) {
                        // return $answer;

                        $answerOption = AnswerOption::where('id', $answer)->first();
                        // return $answerOption->id;

                        if (!$answerOption) continue;

                        $model::create([
                            'user_id'        => $studentId,
                            'section_id'     => $map['section'],
                            'sub_section_id' => $map['sub'],
                            'question_id'    => $questionId,
                            'answer_id'     => $answerOption->id,
                            'answer_option' => $answerOption->option, // a/b/c/d
                        ]);
                    }

                    // ✅ ✅ TEXTAREA3
                    elseif (is_array($answer)) {

                        $cleaned = array_values(array_filter($answer, function ($v) {
                            return trim($v) !== "";
                        }));

                        if (empty($cleaned)) continue;

                        $model::create([
                            'user_id'        => $studentId,
                            'section_id'     => $map['section'],
                            'sub_section_id' => $map['sub'],
                            'question_id'    => $questionId,
                            'answer_id'      => null,
                            'answer_option'  => json_encode($cleaned),
                        ]);
                    }

                    // ✅ ✅ SINGLE TEXTAREA
                    else {

                        $model::create([
                            'user_id'        => $studentId,
                            'section_id'     => $map['section'],
                            'sub_section_id' => $map['sub'],
                            'question_id'    => $questionId,
                            'answer_id'      => null,
                            'answer_option'  => trim($answer),
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', '✅ Test submitted successfully!');
    }
}
