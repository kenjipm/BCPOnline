function seo_item_do(posted_item_id) {
	if (confirm("Ajukan produk untuk menjadi promoted?")) {
		window.location = base_url + '/item/seo_item_do/' + posted_item_id;
	}
}


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

function bayar_seo_item_dummy(posted_item_id){
	$.ajax({
		type: "POST",
		url: base_url + "/tenant/bayar_seo_item_dummy",
		data:
		{
			posted_item_id: posted_item_id
		},
		success: function(data) {
			location.reload();
		}
	});
}