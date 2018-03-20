<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TheScanner</title>
    <meta name="theme-color" content="#1e8b7f">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @if (getenv("APP_ENV") == 'local')
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('/css/JsQRScanner.css') }}">
        <script type="text/javascript" src="{{ URL::asset('/js/jsqrscanner.nocache.js') }}"></script>
        <script src="{{ URL::asset('/js/bootbox.min.js') }}"></script>
        <link rel="manifest" href="{{ URL::asset('/manifest.json') }}">

        <!-- Add to home screen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Scanner PWA">
        <link rel="apple-touch-icon" href="{{ URL::asset('/images/icons8-qr-code-152.png') }}">

        <meta name="msapplication-TileImage" content="{{ URL::asset('/images/icons8-qr-code-144.png') }}">
        <meta name="msapplication-TileColor" content="#2F3BA2">
    @else
        <link type="text/css" rel="stylesheet" href="{{ secure_asset('/css/JsQRScanner.css') }}">
        <script type="text/javascript" src="{{ secure_asset('/js/jsqrscanner.nocache.js') }}"></script>
        <script src="{{ secure_asset('/js/bootbox.min.js') }}"></script>
        <link rel="manifest" href="{{ secure_asset('/manifest.json') }}">

        <!-- Add to home screen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Scanner PWA">
        <link rel="apple-touch-icon" href="{{ secure_asset('/images/icons8-qr-code-152.png') }}">

        <meta name="msapplication-TileImage" content="{{ secure_asset('/images/icons8-qr-code-144.png') }}">
        <meta name="msapplication-TileColor" content="#2F3BA2">
    @endif

    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-md bg-green navbar-dark fixed-bottom">
        <a class="navbar-brand" href="{{ url('/') }}">Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/1') }}">Booth 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/2') }}">Booth 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/3') }}">Booth 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/4') }}">Booth 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/5') }}">Booth 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/6') }}">Booth 6</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>