<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scanner</title>
    <meta name="theme-color" content="#1e8b7f">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">


    @if (getenv("APP_ENV") == 'local')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{ URL::asset('/js/jquery-3.3.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{ secure_asset('/js/jquery-3.3.1.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
    {{--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}

    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-md bg-green navbar-dark fixed-bottom">
        <a class="navbar-brand" href="{{ url('/scan/'.$position) }}">{{ $position }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                @if($position != 'Register')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Register') }}">Register</a>
                </li>
                @endif

                @if($position != 'Booth1')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth1') }}">Booth1</a>
                </li>
                @endif

                @if($position != 'Booth2')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth2') }}">Booth2</a>
                </li>
                @endif

                @if($position != 'Booth3')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth3') }}">Booth3</a>
                </li>
                @endif

                @if($position != 'Booth4')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth4') }}">Booth4</a>
                </li>
                @endif

                @if($position != 'Booth5')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth5') }}">Booth5</a>
                </li>
                @endif

                @if($position != 'Booth6')
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/scan/Booth6') }}">Booth6</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>