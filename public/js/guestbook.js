new Vue({
	el: '#guestBook',

	ready: function(){
		alert('functiona');
		this.fetchMessages();
	},

	methods: {
		fetchMessages: function(){
			this.$http.get('/api/messages', function(messages){
				this.$set('messages', messages);
			});
			
		}
	}
});