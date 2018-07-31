$(document).ready(function(){
	$("#dispute_input").keypress(function(e) {
		if(e.which == 13) {
			send_dispute();
		}
	});
	
	reset_refresh_chat_area_period();
	init_refresh_chat_area_periodically();
	
	setTimeout(function(){
		$("#dispute_panel").scrollTop($("#dispute_panel").prop("scrollHeight") + 2000);
	}, 2000);
});

function refresh_chat_area()
{
	$.ajax({
		type: "POST",
		url: base_url + "/dispute/get_detail",
		data:
		{
			dispute_id: $("#dispute_id").val()
		},
		success: function(data) {
			$("#dispute_text_area").html("");
			data.dispute_texts.forEach(function(item, idx){
				$("#dispute_template").find('.dispute_content').html(item.text);
				$("#dispute_template").find('.dispute_date_sent').html(item.date_sent);
				$("#dispute_template").find('.dispute_sender_name').html(item.sender.name);
				if (item.image_name != "")
				{
					$("#dispute_template").find('.dispute_image_container').show();
					$("#dispute_template").find('.dispute_image').attr("src", item.image_name);
				}
				else $("#dispute_template").find('.dispute_image_container').hide();
				
				if (item.sender.is_you) {
					$("#dispute_template").find('.dispute_sender_name').addClass('cb-pull-right');
					$("#dispute_template").find('.dispute_date_sent').addClass('cb-pull-right');
					$("#dispute_template").find('.dispute_content').addClass('cb-pull-right');
					$("#dispute_template").find('.dispute_container').addClass('cb-align-right');
					// $("#dispute_template").find('.dispute_content').addClass('cb-align-right');
					$("#dispute_template").find('.dispute_image_container').addClass('cb-align-right');
				}
				else {
					$("#dispute_template").find('.dispute_sender_name').removeClass('cb-pull-right');
					$("#dispute_template").find('.dispute_date_sent').removeClass('cb-pull-right');
					$("#dispute_template").find('.dispute_content').removeClass('cb-pull-right');
					$("#dispute_template").find('.dispute_container').removeClass('cb-align-right');
					// $("#dispute_template").find('.dispute_content').removeClass('cb-align-right');
					$("#dispute_template").find('.dispute_image_container').removeClass('cb-align-right');
				}
				
				var dispute_template = $("#dispute_template").html();
				
				$("#dispute_text_area").append(dispute_template);
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

function send_dispute()
{
	var dispute = $("#dispute_input").val();
	$("#dispute_input").attr("disabled", "disabled");
	$("#btn-dispute_send").attr("disabled", "disabled");
	
	var form_data = new FormData();
	var files = $('#image_name')[0].files[0];
	form_data.append('image_name', files);
	form_data.append('text', $("#dispute_input").val());
	form_data.append('dispute_id', $("#dispute_id").val());
	
	$.ajax({
		type: "POST",
		url: base_url + "/dispute/send_dispute_do/",
		data: form_data,
		// {
			// text: $("#dispute_input").val(),
			// dispute_id: $("#dispute_id").val()
		// },
		contentType: false,
		processData: false,
		success: function(data) {
			reset_refresh_chat_area_period();
			$("#dispute_input").removeAttr("disabled");
			$("#btn-dispute_send").removeAttr("disabled");
			
			if (data == "1") { // kalau berhasil, tampilin data ke chat room
				$("#image_name").val('');
				$("#image_name_display").html('');
				$("#dispute_input").val('');
				refresh_chat_area();
				
				setTimeout(function(){
					$("#dispute_panel").scrollTop($("#dispute_panel").prop("scrollHeight") + 2000);
				}, 1000);
				
				$("#dispute_input").focus();
			}
			else if (data == "0") { // kalau gagal, ga usah hapus input nya biar bisa send ulang
				
			}
			else { // not logged in
				window.location = base_url + '/login' + '?return_url=' + window.location.href;
			}
		}
	});
}