<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful - Career Assessment Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 650px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px 30px;
        }
        .header {
            background: #0d6efd;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header img {
            max-height: 60px;
            margin-bottom: 10px;
        }
        .content h2 {
            color: #333;
        }
        .content p {
            color: #555;
            line-height: 1.6;
        }
        .credentials {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
        }
        .credentials ul {
            list-style-type: none;
            padding-left: 0;
        }
        .credentials li {
            padding: 8px 0;
        }
        .btn-login {
            display: inline-block;
            background: #0d6efd;
            color: white !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            color: #888;
            font-size: 12px;
            margin-top: 30px;
        }
        .footer img {
            max-height: 30px;
            vertical-align: middle;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div class="email-container">

        <!-- Header -->
        <div class="header">
            <!-- Add your logo here -->
            {{-- <img src="{{ asset('images/sd-logo.png') }}" alt="SD Logo"> --}}
            <h1>Career Assessment Test</h1>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Hello {{ $name }},</h2>

            <p>Thank you for registering on our platform.</p>

            <p>Your login credentials are provided below:</p>

            <div class="credentials">
                <ul>
                    <li><strong>Email:</strong> {{ $email }}</li>
                    <li><strong>Password:</strong> {{ $password }}</li>
                    
                </ul>
            </div>
            <p style="font-weight:800;">Please keep this information safe and secure. You must wait 24 hours after registration to start the test.</p>
            <p><strong>Login Link:</strong> <a href="{{ $url }}" class="btn-login">Click to Login</a></p>


            {{-- <p>Regards,<br>
            CNC Online Exam Team</p> --}}
        </div>

        <!-- Footer -->
        <div class="footer">
            Powered by
            <img src="{{ asset('assets/image/BIG-SD-Logo-(R).webp') }}" alt="SD Logo">
            in association with
            <img src="{{ asset('assets/image/CNC_LOGO.webp') }}" alt="CNC Logo">
        </div>
    </div>
</body>
</html>
