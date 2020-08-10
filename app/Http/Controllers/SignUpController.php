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
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required',
            'password' => 'required|confirmed|min:8|max:50'
    	]);

        $user = User::create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'email' => request('email'),
            'birthdate' => request('birthdate'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);

    	return redirect()->home();
    }
}
