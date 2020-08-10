<div class="col-sm-6 blog-main">

	<div style="border-style: solid; padding: 5%;">
  	<center><h1>Task List</h1></center>

	<form method="POST" action="/signup">
	{{ csrf_field() }}

		<div class="form-group">
			<label for="task">Task:</label>
		    <input type="text" class="form-control" id="task" name='task' required>
		</div>
	
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign Up</button>
		</div>

		@include ('layouts.errors')
	</form>
	</div>
</div>