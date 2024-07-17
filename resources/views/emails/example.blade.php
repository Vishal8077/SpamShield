<!-- resources/views/emails/example.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['subject'] }}</title>
</head>
<body>
    <p>Dear {{ $data['name'] }},</p>
    <p>{{ $data['message'] }}</p>
    <p>Thank you!</p>
</body>
</html>
