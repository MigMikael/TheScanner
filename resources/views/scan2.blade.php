<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TheScanner</title>

    @if (getenv("APP_ENV") == 'local')
        <link type="text/css" rel="stylesheet" href="{{ URL::asset('/css/JsQRScanner.css') }}">
        <script type="text/javascript" src="{{ URL::asset('/js/jsqrscanner.nocache.js') }}"></script>
    @else
        <link type="text/css" rel="stylesheet" href="{{ secure_asset('/css/JsQRScanner.css') }}">
        <script type="text/javascript" src="{{ secure_asset('/js/jsqrscanner.nocache.js') }}"></script>
    @endif
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        textarea {
            width: 100%;
        }

        .qrscanner {
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-bottom">
        <a class="navbar-brand" href="#">Scanner</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <noscript>
            <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
                Your web browser must have JavaScript enabled
                in order for this application to display correctly.
            </div>
        </noscript>
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>TheScanner</h1>
                <p>Point the camera to QR code</p>
                <div class="qrscanner" id="scanner"></div>
            </div>
            <div class="col-md-6 text-center">
                <p>Scanned Text</p>
                <textarea id="scannedTextMemo" rows="3" readonly></textarea>
                <hr>
                <p>Scanned History</p>
                <textarea id="scannedTextMemoHist" rows="6" readonly></textarea>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function onQRCodeScanned(scannedText)
        {
            var scannedTextMemo = document.getElementById("scannedTextMemo");
            if(scannedTextMemo)
            {
                scannedTextMemo.value = scannedText;
            }
            var scannedTextMemoHist = document.getElementById("scannedTextMemoHist");
            if(scannedTextMemoHist)
            {
                scannedTextMemoHist.value = scannedTextMemoHist.value + '\n' + scannedText;
            }
        }

        //this function will be called when JsQRScanner is ready to use
        function JsQRScannerReady()
        {
            //create a new scanner passing to it a callback function that will be invoked when
            //the scanner succesfully scan a QR code
            var jbScanner = new JsQRScanner(onQRCodeScanned);
            //reduce the size of analyzed image to increase performance on mobile devices
            jbScanner.setSnapImageMaxSize(300);
            var scannerParentElement = document.getElementById("scanner");
            if(scannerParentElement)
            {
                //append the jbScanner to an existing DOM element
                jbScanner.appendTo(scannerParentElement);
            }
        }
    </script>
</body>
</html>