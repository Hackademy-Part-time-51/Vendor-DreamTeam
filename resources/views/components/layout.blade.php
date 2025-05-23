<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap">


</head>

<body class="d-flex flex-column min-vh-100">
    <x-navbar />
    <x-mininavbar />
    @if (!Route::is('messaggi'))
        @livewire('user.notify')
    @endif
    <x-adminRevisore />
    <div class="container-fluid px-0  pb-3">
        {{ $slot }}
    </div>
    {{-- footer da fare --}}
    <x-menu />
    <x-footer />

</body>

</html>
