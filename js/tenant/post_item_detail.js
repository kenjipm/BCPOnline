
function bayar_hot_item_dummy(hot_item_id){
	$.ajax({
		type: "POST",
		url: base_url + "/tenant/bayar_hot_item_dummy",
		data:
		{
			hot_item_id: hot_item_id
		},
		success: function(data) {
			location.reload();
		}
	});
}