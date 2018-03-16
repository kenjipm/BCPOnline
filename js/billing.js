function select_payment_method(name) {
	$("#payment_method-"+name).prop("checked", true);
}

function select_delivery_method(name) {
	$("#delivery_method-"+name).prop("checked", true);
}

function submit_form() {
	$("#form_billing").submit();
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
					submit_form();
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
			else if (data == "-3") {
				$("#voucher_code_status").html("Voucher tidak dapat digunakan lagi hari ini");
			}
			else if (data == "-4") {
				$("#voucher_code_status").html("Total belanja tidak cukup untuk menggunakan voucher ini");
			}
		}
	});
}