function select_payment_method(name) {
	$("#payment_method-"+name).prop("checked", true);
}

function select_delivery_method(name) {
	$("#delivery_method-"+name).prop("checked", true);
}

function cek_kode_voucher() {
	var voucher_code = $("#voucher_code").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/voucher/cek_kode_voucher",
		data:
		{
			voucher_code: voucher_code
		},
		success: function(data) {
			if (data == "1") {
				location.reload();
			}
			else if (data == "0") {
				
			}
		}
	});
}