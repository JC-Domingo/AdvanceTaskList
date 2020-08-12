<div class="col-sm-6 blog-main">

	<div style="border-style: solid; padding: 5%;">
	  	<h2><b>Incomplete Tasks</b></h2>

		<div class="row">
		  	<div class="col-sm-6">
	  			<h5><b>Task</b></h5>
		  	</div>
		  	<div class="col-sm-3">
	  			<h5><b>Deadline</b></h5>
		  	</div>
		</div>

	    @foreach ($tasks as $task)
		  	@if (Auth::User()->id == $task->user_id )
		  	<div class="row">
			  	<div class="col-sm-6">
		      		{{ $task->body }}
			  	</div>
			  	<div class="col-sm-3">
		      		{{ $task->deadline }}
			  	</div>
			  	<div class="col-sm-3">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-danger">Delete</button>
					</span>
			  	</div>
		  	</div>
		    @endif
	    @endforeach
	</div>
</div>