<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('scan', [
            'position' => $position,
            'position_id' =>$this->position_id[$position]
        ]);
    }
}
