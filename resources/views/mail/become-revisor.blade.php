<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor</title>
    
</head>
<body>
    <div>
        <h1>Un utente ha chiesto di lavorare con noi</h1> <br>
        <p>Nome:{{$user->name}}</p> <br>
        <p>Email:{{$user->email}}</p>
        <p>Se vuoi renderlo revisore, clicca qui:</p>
        <a href="{{route('make.revisor', compact('user'))}}"> Rendi revisore</a>
    </div>
</body>
</html>