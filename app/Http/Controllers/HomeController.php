<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Bangkok");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = User::first();
        return view('home', ['data'=>$data]);
    }

    public function profile($id)
    {
        $title = ucwords($id). ' Profile';

        return view('profile', ['title'=>$title]);
    }
}
