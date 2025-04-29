<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>vendor</title>
</head>
<body>
    <div>
        <h1>un utente ha chiesto di lavorare con noi</h1>
        <h2>ecco i suoi dati:</h2>
        <p>nome:{{$user->name}}</p>
        <p>email:{{$user->email}}</p>
        <p>se vuoi renderlo revisore, clicca qui:</p>
        <a href="{{route('make.revisor', compact('user'))}}">rendi revisore</a>
    </div>
</body>
</html>