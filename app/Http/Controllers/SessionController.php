<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function signup()
    {
    	return view('signup.create');
    }

    public function login()
    {
    	return view('session.login');
    }
}
