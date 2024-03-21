<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <style>

        </style>

        <title>Laravel</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link rel="stylesheet" href="../../css/app.css">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
<body>

    @php
        $user_info = session('user');
    @endphp

    @if(Request::is('/') || Request::is('login'))
    
    @include('inc.header')

    @else

    @include('inc.auth_header')

    @endif

    @if (Request::is('settings') || Request::is('profile'))
        @include('inc.profile_bar')   
    @endif
    

    <script src="{{ mix('js/app.js') }}"></script>

    @yield('content')



    <footer>

    </footer>

    <script src="../../js/script.js"></script>

</body>
</html>