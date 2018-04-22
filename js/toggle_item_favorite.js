function toggle_item_favorite(posted_item_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/customer/toggle_item_favorite/",
		data:
		{
			posted_item_id: posted_item_id
		},
		success: function(data) {
			if (data == "1") {
				$("#btn-toggle_item_favorite").removeClass('cb-heart-white');
				$("#btn-toggle_item_favorite").addClass('cb-heart-red');
				$("#btn-toggle_item_favorite").html('');
			}
			else if (data == "0") {
				$("#btn-toggle_item_favorite").removeClass('cb-heart-red');
				$("#btn-toggle_item_favorite").addClass('cb-heart-white');
				$("#btn-toggle_item_favorite").html('');
			}
			else { // not logged in
				window.location = base_url + '/login' + '?return_url=' + window.location.href;
			}
		}
	});
}