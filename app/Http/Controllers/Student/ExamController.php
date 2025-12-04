<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use App\Models\StudentDetails;
use App\Models\MathematicsAptitude;
use App\Models\PhysicsInterest;
use App\Models\ChemistryInterest;
use App\Models\BiologyInterest;
use App\Models\LanguagesAptitude;
use App\Models\CommereceAptitude;
use App\Models\SocialScienceAptitude;
use App\Models\CareerInterests;
use App\Models\LearningStyle;
use App\Models\SelfReflection;

use Illuminate\Http\Request;
use App\Models\Sections;


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
        $sections = Sections::with([
            'subSections.questions.options',
            'questions.options'
        ])->get();
        // return $sections;

        $questions = [];

        foreach ($sections as $section) {

            $sectionTitle = 'Section ' . $section->id . ': ' . $section->name;
            $questions[$sectionTitle] = [];

            // ✅ DIRECT QUESTIONS (WITHOUT SUB-SECTION)
            foreach ($section->questions->whereNull('sub_section_id') as $q) {
                $questions[$sectionTitle][] = [
                    'q' => $q->question,
                    'type' => $q->type,
                    'options' => $q->options->pluck('option_value')->toArray(),
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
                        'options' => $q->options->pluck('option_value')->toArray(),
                    ];
                }
            }
        }
        // return $questions;
        // ✅ ONLY RETURN THE VIEW
        return view('student.cat-exam', compact('questions'));
    }
    public function career_test_submit(Request $request)
    {


        $studentId = auth()->user()->id;
        // return $studentId;
        // return $request->all();
        $mathAptitude = new MathematicsAptitude(); 
        $mathAptitude->user_id = $studentId;
        $mathAptitude->section_id = 1;
        $mathAptitude->question_01 = $request->q1;
        $mathAptitude->question_02 = $request->q2;
        $mathAptitude->question_03 = $request->q3;
        $mathAptitude->question_04 = $request->q4;
        $mathAptitude->question_05 = $request->q5;
        $mathAptitude->save();
        if($mathAptitude->save()){
            $physicsInterest = new PhysicsInterest(); 
            $physicsInterest->user_id = $studentId;
            $physicsInterest->section_id = 2;
            $physicsInterest->sub_section_id = 1;
            $physicsInterest->question_06 = $request->q6;
            $physicsInterest->question_07 = $request->q7;
            $physicsInterest->question_08 = $request->q8;
            $physicsInterest->save();
            if($physicsInterest->save()){
                $chemistryInterest = new ChemistryInterest(); 
                $chemistryInterest->user_id = $studentId;
                $chemistryInterest->section_id = 2;
                $chemistryInterest->sub_section_id = 2;
                $chemistryInterest->question_09 = $request->q9;
                $chemistryInterest->question_10 = $request->q10;
                $chemistryInterest->save();
                if($chemistryInterest->save()){
                    $biologyInterest = new BiologyInterest(); 
                    $biologyInterest->user_id = $studentId;
                    $biologyInterest->section_id = 2;
                    $biologyInterest->sub_section_id = 3;
                    $biologyInterest->question_11 = $request->q11;
                    $biologyInterest->question_12 = $request->q12;
                    $biologyInterest->question_13 = $request->q13;
                    $biologyInterest->save();
                    if($biologyInterest->save()){
                        $languagesAptitude = new LanguagesAptitude(); 
                        $languagesAptitude->user_id = $studentId;
                        $languagesAptitude->section_id = 3;
                        $languagesAptitude->question_14 = $request->q14;
                        $languagesAptitude->question_15 = $request->q15;
                        $languagesAptitude->question_16 = $request->q16;
                        $languagesAptitude->save();
                        if($languagesAptitude->save()){
                            $commerceAptitude = new CommereceAptitude(); 
                            $commerceAptitude->user_id = $studentId;
                            $commerceAptitude->section_id = 4;
                            $commerceAptitude->question_17 = $request->q17;
                            $commerceAptitude->question_18 = $request->q18;
                            $commerceAptitude->question_19 = $request->q19;
                            $commerceAptitude->save();
                            if($commerceAptitude->save()){
                                $socialScienceAptitude = new SocialScienceAptitude(); 
                                $socialScienceAptitude->user_id = $studentId;
                                $socialScienceAptitude->section_id = 5;
                                $socialScienceAptitude->question_20 = $request->q20;
                                $socialScienceAptitude->question_21 = $request->q21;
                                $socialScienceAptitude->question_22 = $request->q22;
                                $socialScienceAptitude->save();
                                if($socialScienceAptitude->save()){
                                    $careerInterests = new CareerInterests(); 
                                    $careerInterests->user_id = $studentId;
                                    $careerInterests->section_id = 6;
                                    $careerInterests->question_23 = json_encode($request->q23);
                                    $careerInterests->question_24 = $request->q24;
                                    $careerInterests->question_25 = $request->q25;
                                    $careerInterests->save();
                                    if($careerInterests->save()){
                                        $learningStyle = new LearningStyle(); 
                                        $learningStyle->user_id = $studentId;
                                        $learningStyle->section_id = 7;
                                        $learningStyle->question_26 = $request->q26;
                                        $learningStyle->question_27 = $request->q27;
                                        $learningStyle->question_28 = $request->q28;
                                        $learningStyle->save();
                                        if($learningStyle->save()){
                                            $selfReflection = new SelfReflection(); 
                                            $selfReflection->user_id = $studentId;
                                            $selfReflection->section_id = 8;
                                            $selfReflection->question_29 = $request->q29;
                                            $selfReflection->question_30 = $request->q30;
                                            $selfReflection->question_31 = json_encode($request->q31);
                                            $selfReflection->question_32 = $request->q32;
                                            $selfReflection->save();
                                            if($selfReflection->save()){
                                               return redirect()->back()->with('success', 'Your test has been submitted successfully!');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
