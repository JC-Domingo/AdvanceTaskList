@extends ('layouts.main')

@section ('content')
	@include ('layouts.sidebar')

	&nbsp;

    <div class="col-sm-7 blog-main">

    	<div style="border-style: solid; padding: 5%;">
	    	<h2><b>User Information</b></h2>

	    	<h5><b>Firstname: </b>{{ Auth::user()->firstname }}</h5>
	    	<h5><b>Lastname: </b>{{ Auth::user()->lastname }}</h5>
	    	<h5><b>Birthdate: </b>{{ Auth::user()->birthdate }}</h5>
	    	<h5><b>Email: </b>{{ Auth::user()->email }}</h5>
		</div>

		&nbsp;


    	<div style="border-style: solid; padding: 5%;">
	    	<h2><b>Update User Information</b></h2>

			<form method="POST" action="/profile">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="firstname">First Name:</label>
				    <input type="text" class="form-control" id="firstname" name='firstname'>
				</div>


				<div class="form-group">
					<label for="lastname">Last Name:</label>
				    <input type="text" class="form-control" id="lastname" name='lastname'>
				</div>

				<div class="form-group">
					<label for="birthdate">Birthdate:</label>
				    <input type="date" class="form-control" id="birthdate" name='birthdate'>
				</div>

				<div class="form-group">
					<label for="email">Email:</label>
				    <input type="email" class="form-control" id="email" name='email'>
				</div>

				<input type="hidden" name="id" value="{{ Auth::user()->id }}">

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>

				@include ('layouts.errors')
			</form>
		</div>
	</div>	
@endsection