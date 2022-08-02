<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dear Mr/Mrs.{{ $user->name }}</h1>
    <h1>This Email is sent to you from milestone blog</h1>
    <p>click here to verify your email <a href="http://127.0.0.1:8000/verify/{{$user->verifyUser->token}}"> Click here.. </a> </p>
    Regards
</body>
</html>