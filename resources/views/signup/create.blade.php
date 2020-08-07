@extends ('layouts.main')

@section ('content')
    <div class="col-sm-6 blog-main">

    	<h1>Sign Up</h1>

		<form method="POST" action="/signup">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="firstname">First Name:</label>
			    <input type="text" class="form-control" id="firstname" name='firstname' required>
			</div>


			<div class="form-group">
				<label for="lastname">Last Name:</label>
			    <input type="text" class="form-control" id="lastname" name='lastname' required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" name='email' required>
			</div>

			<div class="form-group">
				<label for="birthdate">Birthdate:</label>
			    <input type="date" class="form-control" id="birthdate" name='birthdate' required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
			    <input type="password" class="form-control" id="password" name='password' required>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
			    <input type="password" class="form-control" id="password_confirmation" name='password_confirmation' required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Sign Up</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection