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
			
			<li v-if='list.length === 0'>There are no tasks yet!</li>

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

			<div class="row" v-for="(task, index) in list">
			  	<div class="col-sm-4">
		      		{{ task.body }}
		      		<p id="body" style="display: none">{{ task.id }}</p>
			  	</div>
			  	<div class="col-sm-3">
		      		{{ task.deadline }}
			  	</div>
			  	<div class="col-sm-2">
			  		<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" :data-target="'#id01' + task.id">
					  Delete
					</button>
					<!-- <button data-toggle="modal" :data-target="'#id01' + task.id" class="btn btn-danger btn-xs pull-right">Delete</button> -->

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
					        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="deleteTask(task.id)">Delete</button>
					      </div>
					    </div>
					  </div>
					</div>

				</div>
			  	<div class="col-sm-2">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-success">Done</button>&nbsp;
					</span>
			  	</div>
			</div>
		</div>
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

<style>
* {box-sizing: border-box}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  opacity: 0.9;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  padding: 16px;
  text-align: center;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
    width: 100%;
  }
}
</style>