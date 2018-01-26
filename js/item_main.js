function cart_add_do() {
	var posted_item_variance_id = $("#posted_item_variance_id").val();
	var quantity = $("#quantity").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/customer/cart_add_do/1",
		data:
		{
			posted_item_variance_id: posted_item_variance_id,
			quantity: quantity
		},
		success: function(data) {
			if (data == "1") {
				popup.close('popup_buy');
				popup.open('popup_buy_success');
			}
			else if (data == "0") {
				
			}
			else { // not logged in
				window.location = base_url + '/login' + '?return_url=' + window.location.href;
			}
		}
	});
}