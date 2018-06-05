var is_cart_valid = true;

$(document).ready(function(){
	$(".item_quantity").change(function(){
		var posted_item_variance_id = $(this).attr("var_id");
		var quantity = $(this).val();
		cart_set_do(posted_item_variance_id, quantity);
	});
});

function cart_add_do(posted_item_variance_id, quantity)
{
	is_cart_valid = false;
	$.ajax({
		type: "POST",
		url: base_url + "/customer/cart_add_do/1",
		data:
		{
			posted_item_variance_id: posted_item_variance_id,
			quantity: quantity
		},
		success: function(data) {
			is_cart_valid = true;
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
	is_cart_valid = false;
	$.ajax({
		type: "POST",
		url: base_url + "/customer/cart_sub_do/1",
		data:
		{
			posted_item_variance_id: posted_item_variance_id,
			quantity: quantity
		},
		success: function(data) {
			is_cart_valid = true;
			if (data == "1") {
				location.reload();
			}
			else if (data == "0") {
				
			}
		}
	});
}

function cart_set_do(posted_item_variance_id, quantity)
{
	is_cart_valid = false;
	$.ajax({
		type: "POST",
		url: base_url + "/customer/cart_set_do/1",
		data:
		{
			posted_item_variance_id: posted_item_variance_id,
			quantity: quantity
		},
		success: function(data) {
			is_cart_valid = true;
			if (data == "1") {
				location.reload();
			}
			else if (data == "0") {
				
			}
		}
	});
}

function submit_cart()
{
	if ($("#address_id").val() == undefined)
	{
		alert("Harap isi alamat kirim terlebih dahulu");
	}
	else 
	{
		setTimeout(function(){
			if (is_cart_valid) {
				$("#form-cart").submit();
			}
		}, 500);
	}
}