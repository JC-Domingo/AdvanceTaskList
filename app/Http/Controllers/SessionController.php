<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

    public function login()
    {
    	return view('session.login');
    }


    public function store()
    {
    	if (! auth()->attempt(request(['email','password']))){
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again.'
    		]);
    	}

    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
