$(function(){

	// If no url property is passed, the
	// href attribute will be used

	$('#b1').frameWarp();

	$('#b2').frameWarp({
		onMessage: function(msg){
			$('#messages').append('<b>Message Received:</b> '+ msg+'<br />');
		}
	});


});