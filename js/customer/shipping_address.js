function shipping_address_delete(shipping_address_id)
{
	if (confirm("Hapus alamat ini?"))
	{
		$.ajax({
			type: "POST",
			url: base_url + "/customer/shipping_address_delete/",
			data:
			{
				shipping_address_id: shipping_address_id
			},
			success: function(data) {
				location.reload();
				if (data == "1") {
				}
				else if (data == "0") {
					
				}
			}
		});
	}
}

function shipping_address_set_primary(shipping_address_id)
{
	$.ajax({
		type: "POST",
		url: base_url + "/customer/shipping_address_set_primary/",
		data:
		{
			shipping_address_id: shipping_address_id
		},
		success: function(data) {
			if (data == "1") {
				// location.reload();
			}
			else if (data == "0") {
				
			}
		}
	});
}