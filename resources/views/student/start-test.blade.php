<!DOCTYPE html>
<html>

<head>
    <title>Start Career Assessment Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background: linear-gradient(135deg, #edf1ff, #f7f9ff);
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page-wrapper {
            width: 100%;
            padding: 20px;
        }

        .box {
            max-width: 750px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #2f3a8f;
            font-size: 30px;
        }

        .demo-text {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .instructions {
            background: #f0f4ff;
            border-left: 5px solid #4a6cf7;
            padding: 15px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .instructions h3 {
            margin-bottom: 8px;
            color: #2f3a8f;
            font-size: 20px;
        }

        .instructions ul {
            padding-left: 18px;
            color: #444;
            font-size: 14px;
            line-height: 1.7;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
            flex-wrap: wrap;
        }

        .row span:first-child {
            font-weight: bold;
            color: #333;
        }

        .start-btn {
            width: 100%;
            padding: 14px;
            background: #4a6cf7;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 25px;
            transition: 0.3s;
        }

        .start-btn:hover {
            background: #314fe0;
        }

        .start-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .not-eligible-text {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        @media (max-width: 576px) {
            .box {
                padding: 20px;
            }

            .row {
                font-size: 14px;
            }

            .start-btn {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="page-wrapper">

        <div class="box">

            <!-- ✅ TITLE -->
            <h2>Career Assessment Test</h2>

            <!-- ✅ INSTRUCTIONS -->
            <div class="instructions">
                <h3>📌 Instructions – Read Carefully</h3>
                <ul>
                    <li>Please answer every section honestly — this is a <strong>self-reflection tool</strong>, not an
                        exam.</li>
                    <li><strong>Do not skip</strong> any question.</li>
                    <li>You may submit your test early.</li>
                    <li>If you do not submit before the timer ends, your responses will be
                        <strong>automatically submitted</strong> as entered.
                    </li>
                </ul>
            </div>

            <!-- ✅ DEMO TEXT -->
            <p class="demo-text">
                👉 Student Information (View Only) <br>
                Please verify details before starting the test.
            </p>

            <!-- ✅ STUDENT DETAILS -->
            <div class="row">
                <span>Student Name:</span>
                <span>{{ $student_details->name }}</span>
                <input type="hidden" value="{{ $student_details->id }}">
            </div>

            <div class="row">
                <span>Current Class Studying:</span>
                <span>{{ $student_details->current_class }}</span>
            </div>

            <div class="row">
                <span>School Name:</span>
                <span>{{ $student_details->school_name }}</span>
            </div>

            <div class="row">
                <span>Mobile Number:</span>
                <span>{{ $student_details->mobile }}</span>
            </div>

            <div class="row">
                <span>Guardian Mobile Number:</span>
                <span>{{ $student_details->guardian_mobile }}</span>
            </div>

            <div class="row">
                <span>Guardian WhatsApp Number:</span>
                <span>{{ $student_details->guardian_whatsapp }}</span>
            </div>

            <div class="row">
                <span>Email ID:</span>
                <span>{{ $student_details->user->email }}</span>
            </div>


            <!-- ✅ START BUTTON LOGIC -->
            @if ($eligible)
                <a href="{{ route('career.test') }}">
                    <button class="start-btn" id="startBtn">
                        ✅ Start Test
                    </button>
                </a>
            @else
                <button class="start-btn" id="startBtn" disabled>
                    ⏳ Not Eligible Yet
                </button>

                <p class="not-eligible-text" id="waitText">
                    You must wait 24 hours after registration to start the test.
                </p>

                <p class="not-eligible-text">
                    You can start the test after:
                    <strong id="countdown">{{ $remainingTime }}</strong> (HH:MM:SS)
                </p>
            @endif



        </div>

    </div>

    <script>
        let time = "{{ $remainingTime ?? '00:00:00' }}";

        function startCountdown() {
            let parts = time.split(":");
            let hours = parseInt(parts[0]);
            let minutes = parseInt(parts[1]);
            let seconds = parseInt(parts[2]);

            let totalSeconds = (hours * 3600) + (minutes * 60) + seconds;

            let interval = setInterval(() => {
                if (totalSeconds > 0) {
                    totalSeconds--;

                    let h = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
                    let m = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
                    let s = String(totalSeconds % 60).padStart(2, '0');

                    document.getElementById("countdown").innerText = h + ":" + m + ":" + s;
                } else {
                    clearInterval(interval);

                    // ✅ Enable the button
                    let btn = document.getElementById("startBtn");
                    btn.disabled = false;
                    btn.innerText = "✅ Start Test";

                    // ✅ Hide the wait text
                    let waitText = document.getElementById("waitText");
                    if (waitText) waitText.style.display = "none";

                    // ✅ Update countdown to 00:00:00
                    document.getElementById("countdown").innerText = "00:00:00";
                }
            }, 1000);
        }

        startCountdown();
    </script>



</body>

</html>
