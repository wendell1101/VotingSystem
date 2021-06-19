<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return $this->generateStudentNumber();
        return view('home');
    }

    public function generateStudentNumber()
    {
        $max_id = User::max('id');
        return date("Y") . '-' . str_pad(($max_id + 1), 5, "0", STR_PAD_LEFT) . '-ST-0';
    }
}
