@extends ('layouts.main')

@section ('content')
    <div class="col-sm-6 blog-main">

    	<h1>Task List</h1>

		<form method="POST" action="/signup">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="firstname">First Name:</label>
			    <input type="text" class="form-control" id="firstname" name='firstname' placeholder="{{ Auth::user()->firstname }}" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Sign Up</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection