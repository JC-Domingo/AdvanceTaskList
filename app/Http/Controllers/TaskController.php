<?php

namespace App\Http\Controllers;

use App\Task;

use App\User;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
    	return view('layouts.index');
    }

    public function profile()
    {
        return view('profile.account');
    }

    public function update()
    {
        $update = User::where('id', '=', request('id'))->first();
        $update->firstname = request('firstname');
        $update->lastname = request('lastname');
        $update->email = request('email');
        $update->save();

        return view('profile.account');
    }

    public function task()
    {
        return view('task.task');
    }
}
