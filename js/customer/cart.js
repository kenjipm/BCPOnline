function cart_add_do(posted_item_variance_id, quantity)
{
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
				location.reload();
			}
			else if (data == "0") {
				
			}
		}
	});
}

function cart_sub_do(posted_item_variance_id, quantity)
{
	$.ajax({
		type: "POST",
		url: base_url + "/customer/cart_sub_do/1",
		data:
		{
			posted_item_variance_id: posted_item_variance_id,
			quantity: quantity
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