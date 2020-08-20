<template>
	<div>
		<div style="border-style: solid; padding: 5%;">
			YES
		</div>
	</div>
</template>

<script>
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
	}
</script>