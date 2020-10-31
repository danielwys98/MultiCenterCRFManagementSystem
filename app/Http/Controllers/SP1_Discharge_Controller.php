<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SP1_Discharge_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

}
