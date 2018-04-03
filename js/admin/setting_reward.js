$(document).ready(function(){
	
	$("#popup-btn_approve").click(function(){
		$.ajax ({
			type: 'post',
			url: base_url + "/reward/setting_reward_approve_do",
			data:
			{
				setting_reward_id : $("#setting_reward_id").val(),
				password : password
			},
			success: function(data) {
				if (data.code == "-1"){
					alert("Password Salah");
				} else if (data.code == "1"){
					location.reload();
				} else {
					alert("Unknown Error");
				}
			}
		});
	});
	
	$("#popup-btn_decline").click(function(){
		$.ajax ({
			type: 'post',
			url: base_url + "/reward/setting_reward_decline_do",
			data:
			{
				setting_reward_id : $("#setting_reward_id").val(),
				password : password
			},
			success: function(data) {
				if (data.code == "-1"){
					alert("Password Salah");
				} else if (data.code == "1"){
					location.reload();
				} else {
					alert("Unknown Error");
				}
			}
		});
	});
});