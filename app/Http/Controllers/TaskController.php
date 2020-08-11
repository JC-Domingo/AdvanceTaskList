<?php

namespace App\Http\Controllers;

use App\Task;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

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

        $firstname = request('firstname');
        $lastname = request('lastname');
        $birthdate = request('birthdate');
        $email = request('email');

        if ( !$firstname == null){
            $this->validate(request(), [
                'firstname' => 'required|string|max:50'
            ]);
            $update->firstname = request('firstname');
        } 
        if ( !$lastname == null){
            $this->validate(request(), [
                'lastname' => 'required|string|max:50'
            ]);
            $update->lastname = request('lastname');
        } 
        if ( !$birthdate == null){
            $update->birthdate = request('birthdate');
        } 
        if ( !$email == null){
            $this->validate(request(), [
                'email' => 'required|email|unique:users,email'
            ]);
            $update->email = request('email');
        } 

        $update->save();

        return view('layouts.index');
    }


    public function updatePass()
    {
        $update = User::where('id', '=', request('id'))->first();

        $dbpass = $update->password;
        $password = request('oldpassword');

        if (Hash::check($password, $dbpass)){
            $this->validate(request(), [
                'password' => 'required|confirmed|min:8|max:50'
            ]);

            $update->password = bcrypt(request('password'));
            
            $update->save();
        
            return view('layouts.index');
        }
        else{
            return back()->withErrors([
                'message' => 'Please check your old password and try again.'
            ]);
        }

    }

    public function changepass()
    {
        return view('profile.changepass');
    }

    public function task()
    {
        return view('task.task');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);

        return Task::create([ 
            'body' => request('body') 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
        return 204;
    }
}
