$(document).ready(function(){
	$("#message_input").keypress(function(e) {
		if(e.which == 13) {
			send_message();
		}
	});
	
	reset_refresh_chat_area_period();
	init_refresh_chat_area_periodically();
	
	$("#message_panel").scrollTop( $("#anchor").offset().top - 30);  
});

function refresh_chat_area()
{
	$.ajax({
		type: "POST",
		url: base_url + "/message/get_detail",
		data:
		{
			message_inbox_id: $("#message_inbox_id").val()
		},
		success: function(data) {
			$("#message_text_area").html("");
			data.message_texts.forEach(function(item, idx){
				$("#message_template").find('.message_content').html(item.text);
				$("#message_template").find('.message_date_sent').html(item.date_sent);
				$("#message_template").find('.message_sender_name').html(item.sender.name);
				
				var message_template = $("#message_template").html();
				
				$("#message_text_area").append(message_template);
				
				$("#message_panel").scrollTop( $("#anchor").offset().top - 30);  
			});
		}
	});
}

var prev_timeout;
var cur_timeout;
var max_timeout = 60 * 1000;

function reset_refresh_chat_area_period()
{
	prev_timeout = 0;
	cur_timeout = 1 * 1000;
}

function init_refresh_chat_area_periodically()
{
	refresh_chat_area();
	
	// // fungsi linear utk refresh period nya
	// cur_timeout = cur_timeout + 1000;
	
	// // fungsi eksponensial utk refresh period nya
	// cur_timeout = cur_timeout + cur_timeout;
	
	// fungsi fibbonacci utk refresh period nya
	var prev_timeout_temp = cur_timeout;
	cur_timeout = prev_timeout + cur_timeout;
	prev_timeout = prev_timeout_temp;
	
	setTimeout(init_refresh_chat_area_periodically, Math.min(cur_timeout, max_timeout));
}

function send_message()
{
	var message = $("#message_input").val();
	$("#message_input").attr("disabled", "disabled");
	$("#btn-message_send").attr("disabled", "disabled");
	
	$.ajax({
		type: "POST",
		url: base_url + "/message/send_message_do/",
		data:
		{
			text: $("#message_input").val(),
			message_inbox_id: $("#message_inbox_id").val()
		},
		success: function(data) {
			reset_refresh_chat_area_period();
			$("#message_input").removeAttr("disabled");
			$("#btn-message_send").removeAttr("disabled");
			
			if (data == "1") { // kalau berhasil, tampilin data ke chat room
				$("#message_input").val('');
				refresh_chat_area();
			}
			else if (data == "0") { // kalau gagal, ga usah hapus input nya biar bisa send ulang
				
			}
			else { // not logged in
				window.location = base_url + '/login' + '?return_url=' + window.location.href;
			}
		}
	});
}