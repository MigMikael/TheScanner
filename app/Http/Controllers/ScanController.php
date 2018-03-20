<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function scanPosition($position)
    {
        return view('scan', ['position' => $position]);
    }
}
