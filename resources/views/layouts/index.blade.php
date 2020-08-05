@extends ('layouts.main')


@section ('content')
    <div>
    	@if (Auth::check())
	    	<h1>Welcome, {{ Auth::user()->lastname }}</h1>

	    	<p>This website application will help you navigate through all your everyday task.
	    		<br>It displays all your current and completed task, and you can constantly 
	    		<br>add new tasks everytime.</p>
	    @else 
	    	<h1>Welcome</h1>

	    	<p>This website application helps the user navigate through all the user's task.
	    		<br>It displays all the user's current and completed task, and the user can 
	    		<br>constantly add new task everytime the user logs in.</p>
	    @endif
	</div>
@endsection