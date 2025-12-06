<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentDetails;
use Illuminate\Http\Request;
use App\Models\Sections;
use App\Models\AnswerOption;
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

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function student_list()
    {
        $students = StudentDetails::with('user')->latest()->paginate(10);
        return view('admin.student-list', compact('students'));
    }

    // public function studentResultSearch(Request $request)
    // {
    //     $student  = null;
    //     $sections = [];
    //     $answers  = [];
    //     $answerOptions = [];

    //     // Load all students for dropdown
    //     $students = StudentDetails::with('user')->latest()->get();

    //     if ($request->filled('search')) {
    //         // Fetch student by ID from dropdown
    //         $student = StudentDetails::with('user')->where('id', $request->search)->first();

    //         if ($student) {
    //             $userId = $student->user->id;

    //             // Load all sections with subSections & questions
    //             $sections = Sections::with([
    //                 'subSections.questions.options',
    //                 'questions.options'
    //             ])->get();

    //             // Load answer options grouped by question
    //             $answerOptions = AnswerOption::all()->groupBy('question_id');

    //             // Load student answers
    //             $answers = [
    //                 'physics' => PhysicsInterest::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'chemistry' => ChemistryInterest::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'biology' => BiologyInterest::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'mathematics' => MathematicsAptitude::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'languages' => LanguagesAptitude::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'commerce' => CommereceAptitude::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'social_sciences' => SocialScienceAptitude::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'career_interests' => CareerInterests::where('user_id', $userId)->first() ?? new \stdClass(),
    //                 'learning_style' => LearningStyle::where('user_id', $userId)->first() ?? new \stdClass(),
    //             ];
    //         }
    //     }

    //     return view('admin.career-assesment', compact(
    //         'student',
    //         'sections',
    //         'answers',
    //         'answerOptions',
    //         'students'
    //     ));
    // }
    // 🔍 SEARCH PAGE
    // 🔹 Show student search page
    // Student search page
    public function studentResultSearch()
    {
        $students = StudentDetails::with('user')->get();
        return view('admin.student-result-search', compact('students'));
    }

    // Result page
    public function studentResultPage($id)
    {

        $student = StudentDetails::with('user')->findOrFail($id);
        $userId = $student->user->id;

        // Load all sections + sub-sections + questions
        $sections = Sections::with(['subSections.questions', 'questions'])->get();

        // Student answers grouped by section (keys normalized to match section/sub-section names)
        $answers = [
            'mathematics_aptitude'   => MathematicsAptitude::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'physics_interest'       => PhysicsInterest::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'chemistry_interest'     => ChemistryInterest::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'biology_interest'       => BiologyInterest::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'languages_aptitude'     => LanguagesAptitude::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'commerce_aptitude'      => CommereceAptitude::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'social_sciences_aptitude' => SocialScienceAptitude::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'career_interests'       => CareerInterests::where('user_id', $userId)->get()->keyBy('question_id'),
            'learning_style'         => LearningStyle::with('answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'self_reflection'        => SelfReflection::where('user_id', $userId)->get()->keyBy('question_id'),

        ];
        // return $answers['self_reflection'];

        return view('admin.student-result-page', compact('student', 'sections', 'answers'));
    }

    public function searchPage()
    {
        $students = StudentDetails::with('user')->get();
        // return $students;
        return view('admin.students-search', compact('students'));
    }

    // Optional: Live search page
    public function searchResults(Request $request)

    {
        // return $request->all();
        $query = $request->input('query');
        // return $query;
        // Option 1: Extract email if format is "Name (email)"
        if (preg_match('/\((.*?)\)/', $query, $matches)) {
            $email = $matches[1];
            $students = StudentDetails::with('user')
                ->whereHas('user', function ($q) use ($email) {
                    $q->where('email', $email);
                })
                ->get();
        } else {
            // Option 2: Fallback to search by name
            $students = StudentDetails::with('user')
                ->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%");
                })
                ->get();
        }
        // return $students;

        return view('admin.students-search-results', compact('students', 'query'));
    }

    // Result & Recommendation
    // public function resultRecommendation($id)
    // {
    //     // return $id;
    //     $student = StudentDetails::with('user')->findOrFail($id);
    //     $userId = $student->user->id;

    //     // Load answers per section
    //     $answers = [
    //         'mathematics'       => MathematicsAptitude::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'physics'           => PhysicsInterest::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'chemistry'         => ChemistryInterest::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'biology'           => BiologyInterest::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'languages'         => LanguagesAptitude::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'commerce'          => CommereceAptitude::where('user_id', $userId)->get()->keyBy('question_id'),
    //         'social_sciences'   => SocialScienceAptitude::where('user_id', $userId)->get()->keyBy('question_id'),
    //     ];

    //     // Convert option to points
    //     $pointsMap = ['A' => 4, 'B' => 3, 'C' => 2, 'D' => 1];

    //     $scores = [];
    //     foreach ($answers as $section => $sectionAnswers) {
    //         $score = 0;
    //         foreach ($sectionAnswers as $answer) {
    //             $option = strtoupper($answer->answer_option);
    //             $score += $pointsMap[$option] ?? 0;
    //         }
    //         $scores[$section] = $score;
    //     }

    //     // Stream Recommendation
    //     $recommendation = '';
    //     if (($scores['mathematics'] ?? 0) >= 16 && (($scores['physics'] ?? 0) + ($scores['chemistry'] ?? 0)) >= 15 && ($scores['biology'] ?? 0) >= 9 && ($scores['chemistry'] ?? 0) >= 6 && ($scores['mathematics'] ?? 0) >= 12 && ($scores['commerce'] ?? 0) >= 9 && (($scores['languages'] ?? 0) + ($scores['social_sciences'] ?? 0)) >= 18) {
    //         $recommendation = 'Science Stream (PCM) – Engineering, Technology, Research & Science Stream (PCB) – Medical, Healthcare, Life Sciences & Commerce Stream – Business, Finance, Entrepreneurship & Humanities/Arts Stream – Arts, Literature, Social Sciences';
    //     } else if (($scores['mathematics'] ?? 0) >= 16 && (($scores['physics'] ?? 0) + ($scores['chemistry'] ?? 0)) >= 15) {
    //         $recommendation = 'Science Stream (PCM) – Engineering, Technology, Research';
    //     } elseif (($scores['biology'] ?? 0) >= 9 && ($scores['chemistry'] ?? 0) >= 6) {
    //         $recommendation = 'Science Stream (PCB) – Medical, Healthcare, Life Sciences';
    //     } elseif (($scores['mathematics'] ?? 0) >= 12 && ($scores['commerce'] ?? 0) >= 9) {
    //         $recommendation = 'Commerce Stream – Business, Finance, Entrepreneurship';
    //     } elseif ((($scores['languages'] ?? 0) + ($scores['social_sciences'] ?? 0)) >= 18) {
    //         $recommendation = 'Humanities/Arts Stream – Arts, Literature, Social Sciences';
    //     } else {
    //         $recommendation = 'No specific stream recommendation based on your answers.';
    //     }

    //     return view('admin.student-result-recommendation', compact('student', 'scores', 'recommendation'));
    // }
    public function resultRecommendation($id)
    {
        $student = StudentDetails::with('user')->findOrFail($id);
        $userId = $student->user->id;
        $sections = Sections::with(['subSections.questions', 'questions'])->get();

        // ✅ Filter only the final three sections
        $finalSections = $sections->filter(function ($section) {
            return in_array(strtolower($section->name), [
                'career interests',
                'learning style',
                'self-reflection'
            ]);
        })->values(); // reset keys
        // return $finalSections;


        // ✅ Only additional sections for answers
        $answers = [
            'career_interests' => CareerInterests::with('question')->where('user_id', $userId)->get()->keyBy('question_id'),
            'learning_style'   => LearningStyle::with('question', 'answerOption')->where('user_id', $userId)->get()->keyBy('question_id'),
            'self_reflection'  => SelfReflection::with('question')->where('user_id', $userId)->get()->keyBy('question_id'),
        ];
        // return $answers['career_interests'];
        // ✅ Option → Points
        $pointsMap = ['A' => 4, 'B' => 3, 'C' => 2, 'D' => 1];

        // ✅ Subject-wise full marks (for scoring)
        $maxMarks = [
            'mathematics'     => 20,
            'physics'         => 12,
            'chemistry'       => 8,
            'biology'         => 12,
            'languages'       => 12,
            'commerce'        => 12,
            'social_sciences' => 12,
        ];

        // ✅ Load subject answers separately for scores
        $subjectAnswers = [
            'mathematics'       => MathematicsAptitude::with('answerOption')->where('user_id', $userId)->get(),
            'physics'           => PhysicsInterest::with('answerOption')->where('user_id', $userId)->get(),
            'chemistry'         => ChemistryInterest::with('answerOption')->where('user_id', $userId)->get(),
            'biology'           => BiologyInterest::with('answerOption')->where('user_id', $userId)->get(),
            'languages'         => LanguagesAptitude::with('answerOption')->where('user_id', $userId)->get(),
            'commerce'          => CommereceAptitude::with('answerOption')->where('user_id', $userId)->get(),
            'social_sciences'   => SocialScienceAptitude::with('answerOption')->where('user_id', $userId)->get(),
        ];

        // ✅ Calculate scores
        $scores = [];
        foreach ($subjectAnswers as $subject => $answersList) {
            $score = 0;
            foreach ($answersList as $answer) {
                $option = strtoupper($answer->answer_option ?? '');
                $score += $pointsMap[$option] ?? 0;
            }
            $scores[$subject] = $score;
        }

        // ✅ Convert scores to percentages
        $percentages = [];
        foreach ($scores as $subject => $score) {
            $percentages[$subject] = round(($score / $maxMarks[$subject]) * 100, 2);
        }

        // ✅ Recommendation Logic
        $recommendation = '';
        if (($percentages['biology'] ?? 0) == 100 && ($percentages['chemistry'] ?? 0) == 100) {
            $recommendation = 'Science Stream (PCB) – Medical, Healthcare & Life Sciences';
        } elseif (($percentages['mathematics'] ?? 0) == 100 && ($percentages['physics'] ?? 0) == 100 && ($percentages['chemistry'] ?? 0) == 100) {
            $recommendation = 'Science Stream (PCM) – Engineering, Technology & Research';
        } elseif (($percentages['mathematics'] ?? 0) == 100 && ($percentages['commerce'] ?? 0) == 100) {
            $recommendation = 'Commerce Stream – Business, Finance & Entrepreneurship';
        } elseif (($percentages['languages'] ?? 0) == 100 && ($percentages['social_sciences'] ?? 0) == 100) {
            $recommendation = 'Humanities & Arts – Literature, Law & Social Sciences';
        }

        // ✅ Normal conditional recommendations
        $normalRecommendations = [];
        if (($scores['mathematics'] ?? 0) >= 16 && (($scores['physics'] ?? 0) + ($scores['chemistry'] ?? 0)) >= 15) {
            $normalRecommendations[] = 'Science Stream (PCM) – Engineering, Technology, Research';
        }
        if (($scores['biology'] ?? 0) >= 9 && ($scores['chemistry'] ?? 0) >= 6) {
            $normalRecommendations[] = 'Science Stream (PCB) – Medical, Healthcare, Life Sciences';
        }
        if (($scores['mathematics'] ?? 0) >= 12 && ($scores['commerce'] ?? 0) >= 9) {
            $normalRecommendations[] = 'Commerce Stream – Business, Finance, Entrepreneurship';
        }
        if ((($scores['languages'] ?? 0) + ($scores['social_sciences'] ?? 0)) >= 18) {
            $normalRecommendations[] = 'Humanities/Arts – Arts, Literature, Social Sciences';
        }

        if (!$recommendation && !empty($normalRecommendations)) {
            $recommendation = $normalRecommendations[0];
            if (count($normalRecommendations) > 1) {
                $recommendation .= ' | Other Suitable Streams: ' . implode(', ', array_slice($normalRecommendations, 1));
            }
        }

        if (!$recommendation) {
            $recommendation = 'No specific stream recommendation based on your performance.';
        }

        return view('admin.student-result-recommendation', compact(
            'student',
            'scores',
            'percentages',
            'recommendation',
            'finalSections',
            'answers'  // ✅ Only additional sections
        ));
    }
}
