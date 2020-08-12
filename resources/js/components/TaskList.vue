<template>
	<div class='row'>
	  	<h2><b>Add New Task</b></h2>

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
</template>

<script>
	export default {
	  	name: 'root',

		data() {
			return {
				list: [],

				task: {
					id: '',
					body: '',
					deadline: ''
				}
			};
		},

		methods: {
			createTask() {
				axios.post('api/tasks', this.task)
					.then((res) => {
						this.task.body = '';
						this.task.deadline = '';
						this.edit = false;
						this.fetchTaskList();
					})
					.catch((err) => console.error(err));
			}
		}
	}
</script>