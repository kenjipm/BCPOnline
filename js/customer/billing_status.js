function mark_order_finish(order_detail_id)
{
	if (confirm("Apakah pesanan ini sudah selesai dan tidak ada komplain?")) {
		$.ajax({
			type: "POST",
			url: base_url + "/customer/mark_order_finish/",
			data:
			{
				order_detail_id: order_detail_id
			},
			success: function(data) {
				if (data == "1") {
					// $("#btn-mark_order_finish-" + order_detail_id).attr('disabled', 'disabled');
					// $("#btn-mark_order_finish-" + order_detail_id).html('Sudah Selesai');
					
					$("#order_status-" + order_detail_id).html("Selesai");
					$("#btn-mark_order_finish-" + order_detail_id).remove();
					$("#btn-create_dispute-" + order_detail_id).remove();
				}
				else if (data == "0") {
					
				}
				else { // not logged in
					window.location = base_url + '/login' + '?return_url=' + window.location.href;
				}
			}
		});
	}
}

function create_dispute(order_detail_id)
{
	if (confirm("Ajukan Komplain?")) {
		// window.location = base_url + '/customer/create_dispute' + '?order_detail_id=' + order_detail_id;
		$("#form-create_dispute-" + order_detail_id).submit();
	}
}