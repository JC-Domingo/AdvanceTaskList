<template>
	<div class='row'>
	  	<h2><b>Add New Task</b></h2>

		<form action="#" @submit.prevent="createTask()">
			<div class="input-group">
				<input v-model="task.body" type="text" name="body" class="form-control" autofocus>
				&nbsp;
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
					body: ''
				}
			};
		},

		methods: {
			createTask() {
				axios.post('api/tasks', this.task)
					.then((res) => {
						this.task.body = '';
						this.edit = false;
						this.fetchTaskList();
					})
					.catch((err) => console.error(err));
			}
		}
	}
</script>