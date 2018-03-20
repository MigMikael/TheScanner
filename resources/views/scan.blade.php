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
                <h1><b>Scanner</b></h1>
                <p>Point the camera to QR code</p>
                <div class="qrscanner" id="scanner"></div>
            </div>
            <div class="col-lg-12 text-center">
                <hr>
                <p>Scanned Text</p>
                <textarea id="scannedTextMemo" rows="3" readonly></textarea>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function onQRCodeScanned(scannedText)
        {
            $('#scannedTextMemo').val(scannedText);
            var dialog = bootbox.dialog({
                message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Sending...</div>',
                closeButton: true,
                backdrop: true,
                size: 'small'
            });
            var request = $.ajax({
                url: 'https://posttestserver.com/pts.php',
                type: 'post',
                data: {'situation' : 'register', 'user_token' : scannedText}
            });

            request.done(function (response, textStatus, jqXHR){
                console.log("status : " + textStatus);
                console.log("data : " + response);
                dialog.find('.bootbox-body').html('<div class="text-center">SUCCESS</div>');
                dialog.modal('hide');
            });

            request.fail(function (jqXHR, textStatus, errorThrown){
                dialog.modal('hide');
                console.error(
                    "The following error occurred: "+
                    textStatus, errorThrown
                );
                var dialog2 = bootbox.dialog({
                    message: '<div class="text-center" style="color: #FF0000">'+ textStatus +' scan again</div>',
                    closeButton: true,
                    backdrop: true,
                    size: 'small'
                });
            });

            request.always(function () {

            });
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
        <script src="{{ URL::asset('/scripts/app.js') }}" async></script>
    @else
        <script src="{{ secure_asset('/scripts/app.js') }}" async></script>
    @endif
@stop
