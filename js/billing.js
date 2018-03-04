function select_payment_method(name) {
	$("#payment_method-"+name).prop("checked", true);
}

function select_delivery_method(name) {
	$("#delivery_method-"+name).prop("checked", true);
}

function cek_kode_voucher(then_submit=false) {
	var voucher_code = $("#voucher_code").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/voucher/cek_kode_voucher",
		data:
		{
			voucher_code: voucher_code
		},
		success: function(data) {
			if (data == "1") { // == true
				$("#voucher_code_status").html("Voucher diterima");
				if (then_submit)
				{
					$("#form_billing").submit();
				}
			}
			else if (data == "0") {
				$("#voucher_code_status").html("Voucher brand tidak berlaku");
			}
			else if (data == "-1") {
				$("#voucher_code_status").html("Voucher sudah expired");
			}
			else if (data == "-2") {
				$("#voucher_code_status").html("Voucher sudah tidak ada stok");
			}
		}
	});
}