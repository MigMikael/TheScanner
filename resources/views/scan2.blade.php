@extends('main')

@section('style')
    <style>
        body {
            height: 100vh;
            font-family: 'Kanit', sans-serif;
            color: #FFFFFF;
            /*background-color: #d6f7eb;*/
            /*background: linear-gradient(rgb(0,122,109), rgb(122,188,69));*/
            background-image: -webkit-linear-gradient(top, rgb(122,188,69) 0%, rgb(0,122,109) 100vh);
        }
        textarea {
            width: 100%;
            text-align: center;
            background-color: #FFF59D;
            border-style: none;
            border-color: Transparent;
        }
        .qrscanner {
            width: 100%;
            height: 40vh;
            border: solid #FFF59D;
            overflow: hidden;
            background: #FFF59D;
        }
        .first-row {
            padding-top: 4%;
        }
        .bg-green {
            background-color: #757575!important;
        }

        .btn{
            width: 100%;
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
                        <input type="hidden" name="position" value="6">
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
            $('#scannedTextMemo').val(scannedText).css({'background-color':'#28a745', 'color':'#FFFFFF'});
            $('#scanner').css({'background-color': 'transparent', 'border': 'none'})
        }

        function JsQRScannerReady()
        {
            var jbScanner = new JsQRScanner(onQRCodeScanned);
            jbScanner.setSnapImageMaxSize(400);
            var scannerParentElement = document.getElementById("scanner");
            if(scannerParentElement)
            {
                jbScanner.appendTo(scannerParentElement);
            }
        }
    </script>
@stop
