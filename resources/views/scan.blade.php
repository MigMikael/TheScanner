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
                <textarea id="scannedTextMemo" rows="3" readonly></textarea>
            </div>
            <div class="col-lg-12 text-center">
                <button class="btn btn-success btn-lg" onclick="forceReload()">Reload</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function forceReload() {
            window.location.reload(true);
        }

        function onQRCodeScanned(scannedText)
        {
            var substring = "http://", substring2 = 'https://';
            if(scannedText.indexOf(substring) === -1 && scannedText.indexOf(substring2) === -1){ // normal user token
                $('#scannedTextMemo').val(scannedText);
                var dialog = bootbox.dialog({
                    message: '<div class="text-center" style="font-size: 70px"><i class="fa fa-spin fa-spinner"><br></i> Sending...</div>',
                    closeButton: true,
                    backdrop: true,
                    size: 'large',
                    onEscape: true
                });
                //var urls = 'http://localhost:8000/pass_scan_result';
                var urls = 'pi.cp.su.ac.th/PI/QR/post_request.php';
                @if ($position == 'Booth1')
                var position_id = 1;
                @elseif ($position == 'Booth2')
                var position_id = 2;
                @elseif ($position == 'Booth3')
                var position_id = 3;
                @elseif ($position == 'Booth4')
                var position_id = 4;
                @elseif ($position == 'Booth5')
                var position_id = 5;
                @elseif ($position == 'Booth6')
                var position_id = 6;
                @elseif ($position == 'Register')
                var position_id = 7;
                @endif
                var request = $.ajax({
                    url: urls,
                    type: 'post',
                    data: {'position' : position_id, 'user_token' : scannedText}
                });

                request.done(function (response, textStatus, jqXHR){
                    console.log("status : " + textStatus);
                    console.log("data : " + response);
                    dialog.find('.bootbox-body').html('<div class="text-center" style="font-size: 70px">SUCCESS</div>');
                    dialog.modal('hide');
                });

                request.fail(function (jqXHR, textStatus, errorThrown){
                    console.error(
                        "The following error occurred: "+
                        textStatus, errorThrown
                    );
                    //console.log(jqXHR);
                    dialog.find('.bootbox-body').html('<div class="text-center" style="color: #FF0000;font-size: 70px">FAIL</div>');
                    //dialog.modal('hide');
                });

                request.always(function () {
                    //dialog.modal('hide');
                });
            }else{  // link
                var win = window.open(scannedText, '_blank');
                win.focus();
            }
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
    @if (getenv("APP_ENV") == 'local')
        {{--<script src="{{ URL::asset('/scripts/app.js') }}" async></script>--}}
    @else
        {{--<script src="{{ secure_asset('/scripts/app.js') }}" async></script>--}}
    @endif
@stop
