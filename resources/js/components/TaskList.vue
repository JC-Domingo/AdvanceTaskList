<template>
	<div>
		<div style="border-style: solid; padding: 5%;">

			<h2><b>Add Tasks</b></h2>

			<form action="#" @submit.prevent="createTask()">
				<div class="input-group">
		  			<h5><b>Task:</b></h5>
				</div>

				<div class="input-group">
					<input v-model="task.body" type="text" name="body" class="form-control" autofocus>
				</div>

				<br>

				<div class="input-group">
		  			<h5><b>Set Deadline:</b></h5>
				</div>

				<div class="input-group">
					<input v-model="task.deadline" type="date" name='birthdate' class="form-control" autofocus required>
				</div>

				<br>

				<div class="input-group">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Add Task</button>
					</span>
				</div>
			</form>
		</div>

		<br>

		<div style="border-style: solid; padding: 5%;">

			<h2><b>Incomplete Tasks</b></h2>

			<div class="row" v-if='list.length !== 0'>
			  	<div class="col-sm-4">
		  			<h5><b>Task</b></h5>
			  	</div>
			  	<div class="col-sm-3">
		  			<h5><b>Deadline</b></h5>
			  	</div>
			  	<div class="col-sm-2">
				</div>
			  	<div class="col-sm-2">
			  	</div>&nbsp;
			</div>

			<div class="row" v-for="(task, index) in list"  v-if='task.done === 0'>
				<div class="col-sm-4">
			     	{{ task.body }}
			     	<p style="display: none">{{ i++ }}</p>
				</div>

				<div class="col-sm-3">
			      	{{ task.deadline }}
				</div>
				  	
				<div class="col-sm-2">
				  	<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" :data-target="'#id01' + task.id">
						Delete
					</button>

					<!-- Modal -->
					<div class="modal fade" :id="'id01' + task.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
							    	<h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
							        
							    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							        	<span aria-hidden="true">&times;</span>
							    	</button>
								</div>

								<div class="modal-body">
							   		<p>Are you sure you want to delete the task {{ task.body }} ?</p>
								</div>

			  			        <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
		
							        <button type="button" class="btn btn-success" data-dismiss="modal" @click="deleteTask(task.id)">Delete</button>
							    </div>
							</div>
					  	</div>
					</div>
				</div>
			
			  	<div class="col-sm-2">
					<span class="input-group-btn">
						<button type="button" class="btn btn-success" data-dismiss="modal" @click="updateTask(task.id)">Done</button>&nbsp;
					</span>
				</div>
			</div>

			<li v-if='i === 0'>There are no tasks yet!</li>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				list: [],

				i: 0,

				task: {
					id: '',
					body: ''
				}
			};
		},

		created() {
			this.fetchTaskList();
		},

		methods: {
			fetchTaskList() {
				axios.get('api/tasks').then((res) => {
					this.list = res.data;
				});
			},

			createTask() {
				axios.post('api/tasks', this.task)
					.then((res) => {
						this.task.body = '';
						this.edit = false;
						this.fetchTaskList();
					})
					.catch((err) => console.error(err));
			},

			updateTask(id) {
				axios.post('/update', {id: id})
					.then((res) => {
						this.task.id = id;
						this.fetchTaskList();
					})
					.catch((err) => console.error(err));
			},

			deleteTask(id) {
				axios.delete('api/tasks/' + id)
					.then((res) => {
						this.fetchTaskList()
					})
					.catch((err) => console.error(err));
			},
		}
	}
</script>