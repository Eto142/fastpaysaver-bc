<!DOCTYPE html>
<html>
<head>
    <title>Card Delivery Request</title>
</head>
<body>
    <h1>Card Delivery Request Details</h1>
    <p><strong>Transaction ID:</strong> {{ $details['transaction_id'] }}</p>
    <p><strong>Full Name:</strong> {{ $details['fname'] }}</p>
    <p><strong>Address:</strong> {{ $details['address'] }}</p>
    <p><strong>Phone:</strong> {{ $details['phone'] }}</p>
    <p><strong>Email Address:</strong> {{ $details['emailAddress'] }}</p>
</body>
</html>
