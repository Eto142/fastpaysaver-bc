<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FastPay Saver </title>
    <style>
        /* Reset styles */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        /* Global styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        /* Container styles */
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Header styles */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 200px;
            height: auto;
        }

        /* Content styles */
        .content {
            text-align: center;
            margin-bottom: 30px;
        }

        .content h1, .content h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .content p {
            color: #555;
            margin-bottom: 10px;
        }

        .activation-code {
            margin: 20px 0;
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        /* Security tips styles */
        .security-tips {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
            color: #888;
        }

        .security-tips p {
            margin-bottom: 10px;
        }

        .security-tips ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .security-tips ul li {
            margin-bottom: 5px;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #888;
            font-size: 12px;
        }

        .footer a {
            color: #888;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
    
        </div>
        
        <!-- Content -->
        <div class="content">
            <h1>Confirm Your Registration</h1>
            <h2>Welcome to FastPay Saver </h2>
            <p>Your registration is successful, and you are just a step away from verifying your account.</p>
            <p>Please find your activation code below:</p>
            <p class="activation-code">{{$validToken}}</p>
        </div>

        <!-- Security Tips -->
        <div class="security-tips">
            <p><strong>Security Tips:</strong></p>
            <ul>
                <li>Never give your login access to anyone.</li>
                <li>This message is automated; do not reply.</li>
                <li>Enable two-factor authentication for enhanced security.</li>
                <li>Contact us immediately if you notice any suspicious activity.</li>
            </ul>
            <p><em>Kind Regards,<br>FastPay Saver </em></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2026 FastPay Saver . All Rights Reserved.</p>
            <p><a href="#">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>
