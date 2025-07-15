{{-- Hello @if ($data1['gender'] == 'male')
    Mr.
@else
    Ms.
@endif{{ $data1['name'] }},

Thank you for creating an account with us. Please verify your email by clicking the link below:

<a href="http://localhost:8000/verifyAccount/{{ urlencode($data1['email']) }}/{{ $data1['token'] }}">
    Verify Email
</a>

Best regards,
Janki Kansagra --}}


<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; text-align: center;">
    <div
        style="max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

        <h2 style="color: #333;">Hello
            @if ($data1['gender'] == 'male')
                Mr.
            @else
                Ms.
            @endif
            {{ $data1['name'] }},
        </h2>

        <p style="font-size: 16px; color: #555;">Thank you for creating an account with us. Please verify your email by
            clicking the button below:</p>

        <a href="http://localhost:8000/verifyAccount/{{ urlencode($data1['email']) }}/{{ $data1['token'] }}"
            style="display: inline-block; background-color: #28a745; color: white; text-decoration: none; padding: 12px 20px; border-radius: 5px; font-weight: bold;">
            Verify Email
        </a>

        <p style="margin-top: 20px; color: #777;">If the button above doesn't work, you can use the following link:</p>
        <p style="word-wrap: break-word;"><a
                href="http://localhost:8000/verifyAccount/{{ urlencode($data1['email']) }}/{{ $data1['token'] }}">
                http://localhost:8000/verifyAccount/{{ urlencode($data1['email']) }}/{{ $data1['token'] }}
            </a></p>

        <p style="margin-top: 20px; color: #555;">Best regards,</p>
        <p style="font-weight: bold;">Janki Kansagra</p>
    </div>
</body>

</html>
