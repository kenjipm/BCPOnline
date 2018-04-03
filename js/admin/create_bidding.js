$(document).ready(function(){
	
	$("#popup-btn_approve").click(function(){
		if (confirm("Terima bidding ini?"))
		{
			$.ajax ({
				type: 'post',
				url: base_url + "/bidding_live/bidding_approve_do",
				data:
				{
					posted_item_id : $("#posted_item_id").val(),
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
		if (confirm("Tolak bidding ini?"))
		{
			$.ajax ({
				type: 'post',
				url: base_url + "/bidding_live/bidding_decline_do",
				data:
				{
					posted_item_id : $("#posted_item_id").val(),
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