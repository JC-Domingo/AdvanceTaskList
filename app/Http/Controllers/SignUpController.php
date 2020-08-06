<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');

        return view('layouts.index');
    }

    public function create()
    {
    	return view('signup.create');
    }

    public function sign()
    {
    	$this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
    	]);

        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);

    	return redirect()->home();
    }
}
