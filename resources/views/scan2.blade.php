@extends('main')

@section('style')
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            color: #40826d;
            background-color: #d6f7eb;
        }
        textarea {
            width: 100%;
        }
        .qrscanner {
            width: 100%;
            height: 40vh;
            border: solid;
            overflow: hidden;
        }
        .first-row {
            padding-top: 5%;
        }
        .bg-green {
            background-color: #40826d!important;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <noscript>
            <div style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
                Your web browser must have JavaScript enabled
                in order for this application to display correctly.
            </div>
        </noscript>
        <div class="row first-row">
            <div class="col-lg-12 text-center">
                <h1><b>{{ $position }}</b></h1>
                <p>Point the camera to QR code</p>
                <div class="qrscanner" id="scanner"></div>
            </div>
            <div class="col-lg-12 text-center">
                <hr>
                <p>Scanned Text</p>
                <form action="http://pi.cp.su.ac.th/PI/QR/post_request.php" method="post">
                    <div class="form-group">
                        <textarea id="scannedTextMemo" name="user_token" rows="3" readonly></textarea>
                    </div>
                    @if ($position == 'Booth1')
                        <input type="hidden" name="position" value="1">
                    @elseif ($position == 'Booth2')
                        <input type="hidden" name="position" value="2">
                    @elseif ($position == 'Booth3')
                        <input type="hidden" name="position" value="3">
                    @elseif ($position == 'Booth4')
                        <input type="hidden" name="position" value="4">
                    @elseif ($position == 'Booth5')
                        <input type="hidden" name="position" value="5">
                    @elseif ($position == 'Course')
                        <input type="hidden" name="position" value="6">;
                    @elseif ($position == 'Register')
                        <input type="hidden" name="position" value="7">
                    @endif
                    <button class="btn btn-success btn-lg" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function onQRCodeScanned(scannedText)
        {
            $('#scannedTextMemo').val(scannedText);
        }

        function JsQRScannerReady()
        {
            var jbScanner = new JsQRScanner(onQRCodeScanned);
            jbScanner.setSnapImageMaxSize(300);
            var scannerParentElement = document.getElementById("scanner");
            if(scannerParentElement)
            {
                jbScanner.appendTo(scannerParentElement);
            }
        }
    </script>
@stop
