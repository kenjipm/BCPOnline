$(document).ready(function(){
	
	$("#popup-btn_approve").click(function(){
		if (confirm("Terima setting reward ini?"))
		{
			$.ajax ({
				type: 'post',
				url: base_url + "/reward/setting_reward_approve_do",
				data:
				{
					setting_reward_id : $("#setting_reward_id").val(),
					password : $("#popup-password").val(),
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
		}
	});
	
	$("#popup-btn_decline").click(function(){
		if (confirm("Tolak setting reward ini?"))
		{
			$.ajax ({
				type: 'post',
				url: base_url + "/reward/setting_reward_decline_do",
				data:
				{
					setting_reward_id : $("#setting_reward_id").val(),
					password : $("#popup-password").val(),
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
		}
	});
});