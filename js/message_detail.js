$(document).ready(function(){
	$("#message_input").keypress(function(e) {
		if(e.which == 13) {
			send_message();
		}
	});
});

function send_message()
{
	var message = $("#message_input").val();
	
	$("#message_template").find('.message_content').html(message);
	
	var message_template = $("#message_template").html();
	
	$("#message_text_area").append(message_template);
	
	$("#message_input").val('');
}