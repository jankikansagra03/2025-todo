<!DOCTYPE html>
<html>

<head>
    <style>
        .email-container {
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h2 {
            color: #3498db;
        }

        p {
            font-size: 18px;
            color: #666;
        }

        .verify-button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>Hello {{ $data1['gender'] == 'Male' ? 'Mr.' : 'Ms.' }} {{ $data1['name'] }}!</h2>
        <p>Your account is created successfully. Please verify your email to activate your account.</p>
        <a href="http://127.0.0.1:8000/verifyAccount/{{ $data1['email'] }}"
            style="background-color: #3498db; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;">Verify
            Account</a>
    </div>
</body>

</html>
