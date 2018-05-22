function verify_account(){

}

function block_account(){
	$("#popup-btn_approve").html('OK');
	$("#popup-btn_decline").css('display', 'none');
	
	$("#popup-btn_approve").off("click");
	$("#popup-btn_approve").click(function(){
		$.ajax ({
			type: 'post',
			url: base_url + "/admin/validate_superadmin",
			data:
			{
				password : $("#popup-password").val(),
			},
			success: function(data) {
				if (data.code == "-1"){
					alert("Password Salah");
				} else if (data.code == "1"){
					popup.close('popup_approval');
					popup.open('popup_block');
				} else {
					alert("Unknown Error");
				}
			}
		});
	});
	
	popup.open('popup_approval');
}

function unblock_account(){
	$("#popup-btn_approve").html('OK');
	$("#popup-btn_decline").css('display', 'none');
	
	$("#popup-btn_approve").off("click");
	$("#popup-btn_approve").click(function(){
		$.ajax ({
			type: 'post',
			url: base_url + "/admin/validate_superadmin",
			data:
			{
				password : $("#popup-password").val(),
			},
			success: function(data) {
				if (data.code == "-1"){
					alert("Password Salah");
				} else if (data.code == "1"){
					popup.close('popup_approval');
					popup.open('popup_unblock');
				} else {
					alert("Unknown Error");
				}
			}
		});
	});
	
	popup.open('popup_approval');
}