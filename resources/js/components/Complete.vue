<template>
	<div>
		<div style="border-style: solid; padding: 5%;">

			<h2><b>Complete Tasks</b></h2>

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

			<div class="row" v-for="(task, index) in list"  v-if='task.done === 1'>
				<div class="col-sm-4">
			     	{{ task.body }}
			     	<p style="display: none">{{ i++ }}</p>
				</div>

				<div class="col-sm-3">
			      	{{ task.deadline }}
				</div>
				  	
				<div class="col-sm-2">
				  	<!-- Button trigger modal -->
					<button type="button" class="btn btn-danger btn-xs pull-right" data-toggle="modal" :data-target="'#id02' + task.id">
						Delete
					</button>

					<!-- Modal -->
					<div class="modal fade" :id="'id02' + task.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<button type="button" class="btn btn-success" data-dismiss="modal" @click="undoTask(task.id)">Undo</button>&nbsp;
					</span>
				</div>
			</div>

			<li v-if='i === 0'>There are no tasks yet!</li>
		</div>
	</div>
</template>

<script>
	import { bus } from '../bus.js';

	export default {
	  	name: 'root',

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

		mounted() {
			bus.$on('task_update', ()=> {
 				this.fetchTasks();
			})
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

			undoTask(id) {
				axios.post('/undo', {id: id})
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