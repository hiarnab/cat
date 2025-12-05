@extends('layout.student.app')

@section('title', 'Career Assessment Test')
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
        <form id="testForm" action="{{ route('career.test.submit') }}" method="post">
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
@endsection
@push('scripts')

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
    <script>
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('limit-checkbox')) {

                let group = e.target.closest('.checkbox-group');
                let max = parseInt(group.dataset.max);
                let checked = group.querySelectorAll('.limit-checkbox:checked');
                let errorMsg = group.querySelector('.error-msg');

                if (checked.length > max) {
                    e.target.checked = false;

                    // Show error message near label
                    errorMsg.style.display = "block";
                } else {
                    // Hide error when valid
                    errorMsg.style.display = "none";
                }
            }
        });
    </script>
@endpush
