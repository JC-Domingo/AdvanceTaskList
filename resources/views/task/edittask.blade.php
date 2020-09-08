@extends ('layouts.main')

@section ('content')
	<div class="col-sm-6 blog-main"> 
		<div style="border-style: solid; padding: 5%;">
			<h2><b>Edit Tasks</b></h2>

			<form method="POST" action="/edits">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="body">Task:</label>
				    <input type="text" class="form-control" id="body" name='body' required value="{{ $task->body }}">
				</div>

				<div class="form-group">
					<label for="deadline">Deadline:</label>
				    <input type="date" class="form-control" id="deadline" name='deadline' required value="{{ $task->deadline }}">
				</div>

				<div class="form-group">
					<label for="time">Set Time:</label>
				    <input type="time" class="form-control" id="time" name='time' required value="{{ $task->time }}">
				</div>

				<input type="hidden" name="taskid" value="{{ $task->id }}">

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>

				@include ('layouts.errors')
			</form>
		</div>
	</div>
@endsection