<!DOCTYPE html>
<html>

<head>
    <title>Thank You!</title>
</head>

<body>
    <h1>Hello {{ $customer['customer_name'] }},</h1>
    <p>Thank you for submitting your details!</p>

    <p><strong>Email:</strong> {{ $customer['email'] }}</p>
    <p><strong>Contact:</strong> {{ $customer['contect_no'] }}</p>
    <p><strong>State:</strong> {{ $customer['state'] }}</p>
    <p><strong>District:</strong> {{ $customer['district'] }}</p>
    <p><strong>Address:</strong> {{ $customer['address'] }}</p>

    <p>Best Regards,</p>
    <p>SpaceX Team 🚀</p>
</body>

</html>