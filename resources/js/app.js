require('./bootstrap');
import Vue from 'vue';
window.Vue = Vue;
import TaskList from './components/TaskList.vue';
import Complete from './components/Complete.vue';

Vue.component('task-list', TaskList);
Vue.component('complete', Complete);

new Vue({
	el: '#root'
});