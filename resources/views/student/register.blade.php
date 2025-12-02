<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f7f7f7;
        }
        .form-container{
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
        }
        input, select, textarea{
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button{
            background: #007bff;
            color: white;
            padding: 12px;
            width: 100%;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        button:hover{
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Student Registration Form</h2>

    <form action="{{ route('register.submit') }}" method="post">
        @csrf
        <!-- Name -->
        <label>Student Name</label>
        <input type="text" name="name" required>

        <!-- Address -->
        <label>Address</label>
        <textarea name="address" rows="3" required></textarea>

        <!-- Current Class -->
        <label>Current Class Studying</label>
        <input type="text" name="current_class" required>

        <!-- School Name -->
        <label>School Name</label>
        <input type="text" name="school_name" required>

        <!-- Future Stream -->
        <label>Future Stream Choosing</label>
        <select name="future_stream" required>
            <option value="">-- Select Stream --</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
            <option value="Vocational">Vocational</option>
            <option value="Others">Others</option>
        </select>

        <!-- Mobile Number -->
        <label>Student Mobile Number</label>
        <input type="text" name="mobile" maxlength="10">

        <!-- Guardian Mobile Number -->
        <label>Guardian Mobile Number</label>
        <input type="text" name="guardian_mobile" maxlength="10" required>

        <!-- Guardian WhatsApp Number -->
        <label>Guardian WhatsApp Number</label>
        <input type="text" name="guardian_whatsapp" maxlength="10">

        <!-- Email -->
        <label>Email ID</label>
        <input type="email" name="email">

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
