<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ScanController extends Controller
{
    public $position_id = [
        'Booth1' => 1,
        'Booth2' => 2,
        'Booth3' => 3,
        'Booth4' => 4,
        'Booth5' => 5,
        'Booth6' => 6,
        'Register' => 7,
    ];
    public function scanPosition($position)
    {
        //Log::info(getenv("APP_ENV"));
        return view('scan', [
            'position' => $position,
            'urls' => 'http://pi.cp.su.ac.th/PI/QR/post_request.php'
        ]);
    }

    public function passScanResult(Request $request)
    {
        Log::info(getenv("APP_ENV"));
        //$position = $request->get('position');
        //$user_token = $request->get('user_token');

        $position = 7;
        $user_token = 'aljsdlfajsdlfkjaslf';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://pi.cp.su.ac.th/PI/QR/post_request.php',
            CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'position' => $position,
                'user_token' => $user_token
            )
        ));

        curl_exec($curl);
        curl_close($curl);
        return response()->json(['status' => 'success ###']);
    }
}
