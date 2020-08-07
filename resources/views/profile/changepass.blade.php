@extends ('layouts.main')

@section ('content')
	@include ('layouts.sidebar')

	&nbsp;

    <div class="col-sm-7 blog-main">

    	<div style="border-style: solid; padding: 5%;">
	    	<h2><b>Change Password</b></h2>

			<form method="POST" action="/changepass">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="oldpassword">Old Password:</label>
				    <input type="password" class="form-control" id="oldpassword" name='oldpassword' required>
				</div>

				<div class="form-group">
					<label for="password">New Password:</label>
				    <input type="password" class="form-control" id="password" name='password' required>
				</div>

				<div class="form-group">
					<label for="password_confirmation">Password Confirmation:</label>
				    <input type="password" class="form-control" id="password_confirmation" name='password_confirmation' required>
				</div>

				<input type="hidden" name="id" value="{{ Auth::user()->id }}">

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save Changes	</button>
				</div>

				@include ('layouts.errors')
			</form>
		</div>
	</div>
@endsection