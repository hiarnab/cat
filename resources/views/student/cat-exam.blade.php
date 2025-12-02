@extends('layout.student.app')

@section('title', 'Career Assessment Test')

@php
    $questions = [
        'Section 1: Mathematics Aptitude' => [
            [
                'q' => 'How do you feel about solving mathematical problems?',
                'type' => 'mcq',
                'options' => [
                    'I enjoy them and find them challenging in a good way',
                    "I can solve them but don't particularly enjoy them",
                    'I find them difficult and avoid them when possible',
                    'I dislike them and get stressed',
                ],
            ],

            [
                'q' => 'When you see algebraic equations, what is your reaction?',
                'type' => 'mcq',
                'options' => [
                    'I find them interesting and like solving them',
                    'I can solve them with some effort',
                    'I find them confusing',
                    "I don't understand them at all",
                ],
            ],

            [
                'q' => 'How comfortable are you with geometry and shapes?',
                'type' => 'mcq',
                'options' => [
                    'Very comfortable - I can visualize shapes easily',
                    'Somewhat comfortable - I can manage with practice',
                    'Uncomfortable - I find spatial reasoning difficult',
                    'Very uncomfortable - I struggle with geometry',
                ],
            ],

            [
                'q' => 'When working with graphs and charts, do you:',
                'type' => 'mcq',
                'options' => [
                    'Easily understand and interpret what they show',
                    'Understand them after studying them carefully',
                    'Find them confusing',
                    'Avoid tasks involving graphs and charts',
                ],
            ],

            [
                'q' => 'How do you approach logical reasoning problems?',
                'type' => 'mcq',
                'options' => [
                    'I enjoy them and find them engaging',
                    'I can solve them with some effort',
                    'I find them tedious',
                    'I avoid them as much as possible',
                ],
            ],
        ],

        'Section 2: Science Aptitude' => [
            ['sub' => 'Physics Interest'],

            [
                'q' => 'When you see machines or gadgets, are you curious about how they work?',
                'type' => 'mcq',
                'options' => [
                    'Very curious - I often try to understand their mechanism',
                    'Somewhat curious - I might wonder briefly',
                    'Not very curious - I just use them',
                    'Not at all curious',
                ],
            ],

            [
                'q' => 'How interested are you in topics like force, motion, and energy?',
                'type' => 'mcq',
                'options' => ['Very interested', 'Somewhat interested', 'Slightly interested', 'Not interested'],
            ],

            [
                'q' => 'Do you enjoy physics laboratory experiments?',
                'type' => 'mcq',
                'options' => [
                    'I love them and look forward to them',
                    'I find them okay',
                    "I'm not very interested",
                    'I dislike them',
                ],
            ],

            ['sub' => 'Chemistry Interest'],

            [
                'q' => 'How do you feel about chemical reactions and equations?',
                'type' => 'mcq',
                'options' => [
                    'Fascinating - I enjoy learning about them',
                    'Interesting sometimes',
                    'Not very interesting',
                    'Boring and difficult',
                ],
            ],

            [
                'q' => 'When in chemistry lab, are you:',
                'type' => 'mcq',
                'options' => [
                    'Very careful and methodical with procedures',
                    'Reasonably careful',
                    'Sometimes careless',
                    'Uncomfortable with lab work',
                ],
            ],

            ['sub' => 'Biology Interest'],

            [
                'q' => 'How interested are you in learning about the human body and health?',
                'type' => 'mcq',
                'options' => ['Very interested', 'Somewhat interested', 'Slightly interested', 'Not interested'],
            ],

            [
                'q' => 'When studying plants and animals, do you:',
                'type' => 'mcq',
                'options' => [
                    'Find it fascinating and want to learn more',
                    'Find it somewhat interesting',
                    'Study it because you have to',
                    'Find it boring',
                ],
            ],

            [
                'q' => 'How comfortable are you with biological diagrams and processes?',
                'type' => 'mcq',
                'options' => [
                    'Very comfortable - I can understand them easily',
                    'Somewhat comfortable',
                    'Uncomfortable',
                    'Very uncomfortable',
                ],
            ],
        ],

        'Section 3: Languages Aptitude' => [
            [
                'q' => 'How do you feel about reading stories and literature?',
                'type' => 'mcq',
                'options' => [
                    'I love reading and often read for pleasure',
                    'I enjoy reading sometimes',
                    'I read only when required',
                    'I dislike reading',
                ],
            ],

            [
                'q' => 'When writing essays or compositions, do you:',
                'type' => 'mcq',
                'options' => [
                    'Enjoy expressing my thoughts creatively',
                    'Find it okay, but it takes effort',
                    'Find it difficult to express ideas',
                    'Strongly dislike writing tasks',
                ],
            ],

            [
                'q' => 'How is your vocabulary and grammar skills?',
                'type' => 'mcq',
                'options' => [
                    'Excellent - I enjoy learning new words',
                    'Good - I manage well',
                    'Average - I sometimes struggle',
                    'Poor - I find language rules difficult',
                ],
            ],
        ],

        'Section 4: Commerce Aptitude' => [
            [
                'q' => 'How good are you at managing money or budgets?',
                'type' => 'mcq',
                'options' => [
                    'Very good - I naturally plan and organize',
                    'Reasonably good',
                    'Not very good',
                    "Poor - I don't enjoy financial planning",
                ],
            ],

            [
                'q' => 'Are you interested in business and economic concepts?',
                'type' => 'mcq',
                'options' => ['Very interested', 'Somewhat interested', 'Slightly interested', 'Not interested'],
            ],

            [
                'q' => 'How organized are you with numbers and records?',
                'type' => 'mcq',
                'options' => [
                    'Very organized - I like keeping things systematic',
                    'Somewhat organized',
                    'Not very organized',
                    'Disorganized - I dislike record keeping',
                ],
            ],
        ],

        'Section 5: Social Sciences Aptitude' => [
            [
                'q' => 'How interested are you in historical events and dates?',
                'type' => 'mcq',
                'options' => [
                    'Very interested - I find history fascinating',
                    'Somewhat interested',
                    'Slightly interested',
                    'Not interested - I find it boring',
                ],
            ],

            [
                'q' => 'When studying geography and maps, do you:',
                'type' => 'mcq',
                'options' => [
                    'Enjoy learning about different places and cultures',
                    'Find it somewhat interesting',
                    'Study it because you have to',
                    'Find it uninteresting',
                ],
            ],

            [
                'q' => 'How do you feel about discussing social and political issues?',
                'type' => 'mcq',
                'options' => [
                    'I enjoy discussions and have strong opinions',
                    'I sometimes participate in discussions',
                    'I rarely participate',
                    'I avoid such discussions',
                ],
            ],
        ],

        'Section 6: Career Interests' => [
            [
                'q' => 'Which of these fields interests you the most? (Choose top 3)',
                'type' => 'checkbox',
                'items' => [
                    'Engineering and Technology',
                    'Medical and Healthcare',
                    'Scientific Research',
                    'Teaching and Education',
                    'Business and Management',
                    'Government Services',
                    'Arts and Literature',
                    'Law and Legal Services',
                    'Design and Creative Fields',
                    'Environmental Science',
                ],
            ],

            [
                'q' => 'What type of work environment do you prefer?',
                'type' => 'mcq',
                'options' => [
                    'Laboratory or research setting',
                    'Office with structured work',
                    'Creative and flexible environment',
                    'Field work with variety',
                    'Helping people directly',
                ],
            ],

            [
                'q' => 'What is most important to you in a career?',
                'type' => 'mcq',
                'options' => [
                    'High salary',
                    'Job satisfaction',
                    'Helping society',
                    'Creativity and innovation',
                    'Job security',
                ],
            ],
        ],

        'Section 7: Learning Style' => [
            [
                'q' => 'How do you learn best?',
                'type' => 'mcq',
                'options' => [
                    'Through practical experiments and hands-on work',
                    'By reading and making notes',
                    'Through discussions and group study',
                    'By solving problems and practicing',
                    'Through visual aids and demonstrations',
                ],
            ],

            [
                'q' => 'When faced with a difficult problem, do you:',
                'type' => 'mcq',
                'options' => [
                    'Enjoy the challenge and persist until solved',
                    'Try to solve it but may give up if too hard',
                    'Ask for help immediately',
                    'Avoid difficult problems',
                ],
            ],

            [
                'q' => 'What describes your study style best?',
                'type' => 'mcq',
                'options' => [
                    'Regular and systematic',
                    'Last-minute but effective',
                    'Need pressure to study',
                    'Enjoy learning new concepts',
                ],
            ],
        ],

        'Section 8: Self-Reflection' => [
            ['q' => 'What are your strongest subjects currently?', 'type' => 'textarea'],
            ['q' => 'What subjects do you enjoy the most?', 'type' => 'textarea'],
            ['q' => 'List three careers you have considered:', 'type' => 'textarea3'],
            ['q' => 'What are your main hobbies and interests?', 'type' => 'textarea'],
        ],
    ];
@endphp



@push('styles')
    <style>
        .exam-box {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin: auto;
            overflow-x: hidden;
        }

        .question {
            margin: 20px 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 12px;
        }

        .option {
            margin-left: 20px;
            margin-top: 6px;
        }

        .nav-buttons {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 10px 18px;
            background: #4a6cf7;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }

        /* TEXTAREA & MULTI INPUTS */
        textarea,
        input[type=text] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .exam-box {
                padding: 15px;
                margin: 10px;
            }

            .nav-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .option {
                margin-left: 10px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="exam-box">
        <form id="testForm" action="#" method="post">
            @csrf
            @php
                $secCount = 1;
                $qCount = 1;
            @endphp

            @foreach ($questions as $sectionName => $qs)
                <div id="section{{ $secCount }}" class="section-block" style="display:none;">
                    <h2>{{ $sectionName }}</h2>

                    @foreach ($qs as $item)
                        @if (isset($item['sub']))
                            <h3 style="margin-top:20px;">{{ $item['sub'] }}</h3>
                            @continue
                        @endif

                        <div class="question">
                            <p><strong>{{ $qCount }}.</strong> {{ $item['q'] }}</p>
                            @include('student.dynamic-options', ['item' => $item, 'index' => $qCount])
                        </div>
                        @php $qCount++; @endphp
                    @endforeach

                    <div class="nav-buttons">
                        @if ($secCount > 1)
                            <button type="button" class="nav-btn"
                                onclick="showSection({{ $secCount - 1 }})">Previous</button>
                        @else
                            <div></div>
                        @endif

                        @if ($secCount < count($questions))
                            <button type="button" class="nav-btn" onclick="showSection({{ $secCount + 1 }})">Next</button>
                        @else
                            {{-- <button type="submit" class="nav-btn" style="background:#27ae60;">Submit</button> --}}
                        @endif
                    </div>

                </div>

                @php $secCount++; @endphp
            @endforeach

        </form>
    </div>

    <script>
        function showSection(id) {
            document.querySelectorAll('.section-block').forEach(e => e.style.display = 'none');
            document.getElementById('section' + id).style.display = 'block';

            // update sidebar highlight
            document.querySelectorAll('.section-btn').forEach(e => e.classList.remove('active-btn'));
            let btn = document.getElementById('btn' + id);
            if (btn) btn.classList.add('active-btn');
        }

        showSection(1);

        // TIMER
        let time = 1800; // 30 minutes in seconds
        let timerInterval = setInterval(() => {
            let min = Math.floor(time / 60),
                sec = time % 60;
            document.getElementById("timer").innerText = `${min}:${sec < 10 ? '0' + sec : sec}`;

            if (time <= 0) {
                clearInterval(timerInterval);
                document.getElementById("testForm").submit(); // auto-submit
            } else {
                time--;
            }
        }, 1000);
    </script>

@endsection
