function mark_order_finish(order_detail_id, tenant_id)
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
					
					$("#order_action-" + order_detail_id).html("<button type='button' class='cb-button-form' id='btn-create_feedback-" + order_detail_id + "' onclick='open_popup_feedback(" + order_detail_id + ", " + tenant_id + ")'>ULASAN</button>");
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

function open_popup_feedback(order_detail_id, tenant_id)
{
	$("#feedback-order_detail_id").val(order_detail_id);
	$("#feedback-tenant_id").val(tenant_id);
	
	$.ajax({
		type: "POST",
		url: base_url + "/feedback/get_customer_json",
		data:
		{
			order_detail_id: order_detail_id
		},
		success: function(data) {
			if (data.is_exist)
			{
				var feedback = data.feedback;
				$("#feedback-rating").val(feedback.rating);
				$("#feedback-feedback_text").val(feedback.feedback_text);
				$("#btn-create_feedback").html("Ubah");
			}
			else
			{
				$("#feedback-rating").val(5);
				$("#feedback-feedback_text").val("");
				$("#btn-create_feedback").html("Kirim");
			}
			popup.open('popup_feedback');
		}
	});
}

function create_feedback()
{
	var order_detail_id = $("#feedback-order_detail_id").val();
	var tenant_id = $("#feedback-tenant_id").val();
	var rating = $("#feedback-rating").val();
	var feedback_text = $("#feedback-feedback_text").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/customer/create_feedback",
		data:
		{
			order_detail_id: order_detail_id,
			feedback_text: feedback_text,
			rating: rating,
			feedback_for: tenant_id
		},
		success: function(data) {
			console.log(data);
			popup.close('popup_feedback');
			popup.open('popup_feedback_success');
		}
	});
}

function toggle_order_status_history(order_status_history_id)
{
	$("#order_status_history-" + order_status_history_id).toggle();
}