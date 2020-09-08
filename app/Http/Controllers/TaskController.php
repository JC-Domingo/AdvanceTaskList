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
        $this->middleware('auth')->except(['main']);
    }

    public function main()
    {
    	return view('layouts.index');
    }

    public function profile()
    {
        return view('profile.account');
    }

    public function updateInfo()
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

    public function tasks()
    {
        return view('task.task');
    }

    public function index()
    {
        return Task::latest()->get();
    }

    public function updated(Request $request)
    {
        $task = Task::findOrFail(request('id'));
        
        $task->done = TRUE;
        $task->save();

        return back();
    }


    public function undotask(Request $request)
    {
        $task = Task::findOrFail(request('id'));

        $task->done = FALSE;
        $task->save();

        return redirect('/');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500',
            'deadline' => 'required',
            'time' => 'required'
        ]);

        auth()->user()->add(
            new Task(request(['body','deadline','time']))
        );

        return back();
    }

    public function edit()
    {
        $task = Task::findOrFail(request('taskid'));

        return view('task.edittask', compact('task'));
    }

    public function editTask()
    {
        $task = Task::findOrFail(request('taskid'));

        $this->validate(request(), [
            'body' => 'required',
            'deadline' => 'required',
            'time' => 'required',
        ]);

        $task->body = request('body');
        $task->deadline = request('deadline');
        $task->time = request('time');

        $task->save();

        return redirect()->route('task');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return 204;
    }
}
