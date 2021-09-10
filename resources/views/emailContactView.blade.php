<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message de contact</title>
</head>
<body>
    <h1 style="text-align: center; padding: 10px 15px; background: #292BA0; color: #fff">Message de contact</h1>
    <div>
        <h3>Nom & Prénom : {{ $details['name'] }}</h3>
        <h3>E-mail : {{ $details['email'] }}</h3>
        <h3>Sujet : {{ $details['subject'] }}</h3>
        <h3>Message :</h3>
        <p>{{ $details['message'] }}</p>
    </div>
</body>
</html>