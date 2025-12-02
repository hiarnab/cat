<!DOCTYPE html>
<html>
<head>
    <title>Start Career Assessment Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .box {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .demo-text {
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        .row span:first-child {
            font-weight: bold;
            color: #333;
        }

        .start-btn {
            width: 100%;
            padding: 12px;
            background: #4a6cf7;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 25px;
        }

        .start-btn:hover {
            background: #314fe0;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Career Assessment Test</h2>

    <p class="demo-text">
        👉 Demo Student Information (View Only)
        <br>
        Please verify details before starting the test.
    </p>

    <div class="row">
        <span>Student Name:</span>
        <span>Demo Student Name</span>
    </div>

    <div class="row">
        <span>Current Class Studying:</span>
        <span>10th Class</span>
    </div>

    <div class="row">
        <span>School Name:</span>
        <span>Demo Public School</span>
    </div>

    <div class="row">
        <span>Mobile Number:</span>
        <span>9876543210</span>
    </div>

    <div class="row">
        <span>Guardian Mobile Number:</span>
        <span>9876543211</span>
    </div>

    <div class="row">
        <span>Guardian WhatsApp Number:</span>
        <span>9876543211</span>
    </div>

    <div class="row">
        <span>Email ID:</span>
        <span>demo@student.com</span>
    </div>

    <a href="{{ url('/career-test') }}">
        <button class="start-btn">
            ✅ Start Test
        </button>
    </a>

</div>

</body>
</html>
