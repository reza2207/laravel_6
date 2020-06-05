<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Postnote;


class ProfileController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$data = User::first();
        return view('home', ['data'=>$data]);
    }

    public function profile($username)
    {   
        //$name = Auth::user()->username;
        $name = $username;

        $user = User::where('username', $username)->firstOrFail();
        $post = Postnote::where('user_id', $user->id)->orderBy('id','asc')->get();
        
        return view('profile', ['user'=>$user, 'post'=>$post]);
    }

}
