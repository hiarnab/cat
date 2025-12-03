<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\AnswerOption;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  public function run(): void
    {
        // DB::table('answer_options')->truncate();
        // DB::table('questions')->truncate();

        $questions = [

            // ✅ SECTION 1: MATHEMATICS APTITUDE (section_id = 1)
            [1,null,'mcq',1,'How do you feel about solving mathematical problems?',[
                'I enjoy them and find them challenging in a good way',
                "I can solve them but don't particularly enjoy them",
                'I find them difficult and avoid them when possible',
                'I dislike them and get stressed',
            ]],
            [1,null,'mcq',2,'When you see algebraic equations, what is your reaction?',[
                'I find them interesting and like solving them',
                'I can solve them with some effort',
                'I find them confusing',
                "I don't understand them at all",
            ]],
            [1,null,'mcq',3,'How comfortable are you with geometry and shapes?',[
                'Very comfortable - I can visualize shapes easily',
                'Somewhat comfortable - I can manage with practice',
                'Uncomfortable - I find spatial reasoning difficult',
                'Very uncomfortable - I struggle with geometry',
            ]],
            [1,null,'mcq',4,'When working with graphs and charts, do you:',[
                'Easily understand and interpret what they show',
                'Understand them after studying them carefully',
                'Find them confusing',
                'Avoid tasks involving graphs and charts',
            ]],
            [1,null,'mcq',5,'How do you approach logical reasoning problems?',[
                'I enjoy them and find them engaging',
                'I can solve them with some effort',
                'I find them tedious',
                'I avoid them as much as possible',
            ]],

            // ✅ SECTION 2: SCIENCE – PHYSICS (section_id = 2, sub_section_id = 1)
            [2,1,'mcq',6,'When you see machines or gadgets, are you curious about how they work?',[
                'Very curious - I often try to understand their mechanism',
                'Somewhat curious - I might wonder briefly',
                'Not very curious - I just use them',
                'Not at all curious',
            ]],
            [2,1,'mcq',7,'How interested are you in topics like force, motion, and energy?',[
                'Very interested','Somewhat interested','Slightly interested','Not interested'
            ]],
            [2,1,'mcq',8,'Do you enjoy physics laboratory experiments?',[
                'I love them and look forward to them',
                'I find them okay',
                "I'm not very interested",
                'I dislike them',
            ]],

            // ✅ CHEMISTRY (sub_section_id = 2)
            [2,2,'mcq',9,'How do you feel about chemical reactions and equations?',[
                'Fascinating - I enjoy learning about them',
                'Interesting sometimes',
                'Not very interesting',
                'Boring and difficult',
            ]],
            [2,2,'mcq',10,'When in chemistry lab, are you:',[
                'Very careful and methodical with procedures',
                'Reasonably careful',
                'Sometimes careless',
                'Uncomfortable with lab work',
            ]],

            // ✅ BIOLOGY (sub_section_id = 3)
            [2,3,'mcq',11,'How interested are you in learning about the human body and health?',[
                'Very interested','Somewhat interested','Slightly interested','Not interested'
            ]],
            [2,3,'mcq',12,'When studying plants and animals, do you:',[
                'Find it fascinating and want to learn more',
                'Find it somewhat interesting',
                'Study it because you have to',
                'Find it boring',
            ]],
            [2,3,'mcq',13,'How comfortable are you with biological diagrams and processes?',[
                'Very comfortable','Somewhat comfortable','Uncomfortable','Very uncomfortable'
            ]],

            // ✅ SECTION 3: LANGUAGES (section_id = 3)
            [3,null,'mcq',14,'How do you feel about reading stories and literature?',[
                'I love reading and often read for pleasure',
                'I enjoy reading sometimes',
                'I read only when required',
                'I dislike reading',
            ]],
            [3,null,'mcq',15,'When writing essays or compositions, do you:',[
                'Enjoy expressing my thoughts creatively',
                'Find it okay, but it takes effort',
                'Find it difficult to express ideas',
                'Strongly dislike writing tasks',
            ]],
            [3,null,'mcq',16,'How is your vocabulary and grammar skills?',[
                'Excellent - I enjoy learning new words',
                'Good - I manage well',
                'Average - I sometimes struggle',
                'Poor - I find language rules difficult',
            ]],

            // ✅ SECTION 4: COMMERCE (section_id = 4)
            [4,null,'mcq',17,'How good are you at managing money or budgets?',[
                'Very good - I naturally plan and organize',
                'Reasonably good',
                'Not very good',
                'Poor - I don’t enjoy financial planning',
            ]],
            [4,null,'mcq',18,'Are you interested in business and economic concepts?',[
                'Very interested','Somewhat interested','Slightly interested','Not interested'
            ]],
            [4,null,'mcq',19,'How organized are you with numbers and records?',[
                'Very organized','Somewhat organized','Not very organized','Disorganized'
            ]],

            // ✅ SECTION 5: SOCIAL SCIENCE (section_id = 5)
            [5,null,'mcq',20,'How interested are you in historical events and dates?',[
                'Very interested','Somewhat interested','Slightly interested','Not interested'
            ]],
            [5,null,'mcq',21,'When studying geography and maps, do you:',[
                'Enjoy learning about different places and cultures',
                'Find it somewhat interesting',
                'Study it because you have to',
                'Find it uninteresting',
            ]],
            [5,null,'mcq',22,'How do you feel about discussing social and political issues?',[
                'I enjoy discussions and have strong opinions',
                'I sometimes participate in discussions',
                'I rarely participate',
                'I avoid such discussions',
            ]],

            // ✅ SECTION 6: CAREER (section_id = 6)
            [6,null,'multi',23,'Which of these fields interests you the most?',[
                'Engineering and Technology','Medical and Healthcare','Scientific Research',
                'Teaching and Education','Business and Management','Government Services',
                'Arts and Literature','Law and Legal Services','Design and Creative Fields',
                'Environmental Science'
            ]],

            // ✅ WORK STYLE & CAREER VALUES
            [6,null,'mcq',24,'What type of work environment do you prefer?',[
                'Laboratory or research setting','Office with structured work',
                'Creative and flexible environment','Field work with variety','Helping people directly'
            ]],
            [6,null,'mcq',25,'What is most important to you in a career?',[
                'High salary','Job satisfaction','Helping society','Creativity and innovation','Job security'
            ]],

            // ✅ SECTION 7: LEARNING STYLE (section_id = 7)
            [7,null,'mcq',26,'How do you learn best?',[
                'Through practical experiments','By reading and making notes',
                'Through discussions','By solving problems','Through visual aids'
            ]],
            [7,null,'mcq',27,'When faced with a difficult problem, do you:',[
                'Enjoy the challenge','Try but may give up','Ask for help immediately','Avoid difficult problems'
            ]],
            [7,null,'mcq',28,'What describes your study style best?',[
                'Regular and systematic','Last-minute but effective','Need pressure to study','Enjoy learning new concepts'
            ]],

            // ✅ SECTION 8: SELF REFLECTION (section_id = 8)
            [8,null,'text',29,'What are your strongest subjects currently?',[]],
            [8,null,'text',30,'What subjects do you enjoy the most?',[]],
            [8,null,'text',31,'List three careers you have considered:',[]],
            [8,null,'text',32,'What are your main hobbies and interests?',[]],
        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'section_id'      => $q[0],
                'sub_section_id' => $q[1],
                'type'           => $q[2],
                'question_no'    => $q[3],
                'question'       => $q[4],
            ]);

            foreach ($q[5] as $index => $opt) {
                AnswerOption::create([
                    'question_id'  => $question->id,
                    'option'       => chr(97 + $index), // a,b,c,d,e
                    'option_value' => $opt,
                ]);
            }
        }
    }
}
