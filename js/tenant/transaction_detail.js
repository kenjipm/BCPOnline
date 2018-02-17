
function set_nego_price(){

	document.getElementById("add_customer").style.display = 'block';
	document.getElementById("add_price").style.display = 'none';

}

function reply_feedback()
{
	var order_detail_id = $("#feedback-order_detail_id").val();
	var reply_feedback_text = $("#feedback-reply_feedback_text").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/tenant/reply_feedback",
		data:
		{
			order_detail_id: order_detail_id,
			reply_feedback_text: reply_feedback_text
		},
		success: function(data) {
			console.log(data);
			popup.close('popup_review');
			popup.open('popup_review_success');
		}
	});
}