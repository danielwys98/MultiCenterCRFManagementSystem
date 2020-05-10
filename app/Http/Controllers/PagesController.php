<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function loginPage()
    {
        return view('auth.login');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function preScreening()
    {
        return view('preScreening');
    }
    public function studySpecific()
    {
        return view('studySpecific');
    }
    public function preScreeningDB()
    {
        return view('preScreeningdb');
    }
    public function studySpecificDB()
    {
        return view('studySpecificdb');
    }
    public function preScreeningForm()
    {
        return view('preScreeningForm');
    }

}
