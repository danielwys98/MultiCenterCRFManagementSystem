<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostStudy_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkAdmin', ['except' => 'studies']);
    }
}
