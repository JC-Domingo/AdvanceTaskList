require('./bootstrap');
import Vue from 'vue';
import TaskList from './components/TaskList.vue';
import Complete from './components/Complete.vue';

Vue.component('task-list', TaskList);
Vue.component('complete', Complete);

var root = new Vue({
	el: '#root'
});