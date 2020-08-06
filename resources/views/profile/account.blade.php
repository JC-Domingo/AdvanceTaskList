@extends ('layouts.main')

@section ('content')
    <div class="col-sm-6 blog-main">

    	<h1>User Information</h1>

		<form method="POST" action="/profile">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="firstname">First Name:</label>
			    <input type="text" class="form-control" id="firstname" name='firstname' value="{{ Auth::user()->firstname }}" required>
			</div>


			<div class="form-group">
				<label for="lastname">Last Name:</label>
			    <input type="text" class="form-control" id="lastname" name='lastname' value="{{ Auth::user()->lastname }}" required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
			    <input type="email" class="form-control" id="email" name='email' value="{{ Auth::user()->email }}" required>
			</div>

			<input type="hidden" name="id" value="{{ Auth::user()->id }}">
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Save Changes	</button>
			</div>

			@include ('layouts.errors')
		</form>
	</div>
@endsection