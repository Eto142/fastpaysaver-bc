<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FastPay Saver </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        h1, h2, h3 {
            margin-bottom: 15px;
            color: #333;
        }
        p {
            margin-bottom: 10px;
            color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
        ul {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <h1>Welcome to FastPay Saver </h1>
        <p>Hello,</p>
        <p>Thank you for registering with FastPay Saver . Your registration is successful, and you are just one step away from verifying your account.</p>
        <h2>Activation Code:</h2>
        <p style="font-size: 24px; font-weight: bold;">{{$validToken}}</p>
        <hr>
        <h3>Security Tips:</h3>
        <ul>
            <li>Never share your login details with anyone.</li>
            <li>This message is automated; please do not reply.</li>
        </ul>
        <p>Kind Regards,<br>FastPay Saver  Team</p>
    </div>
    <div class="footer">
        <p>&copy; 2026 FastPay Saver  - All Rights Reserved</p>
        <a href="#" class="button">Unsubscribe</a>
    </div>
</body>
</html>
