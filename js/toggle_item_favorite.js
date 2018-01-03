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
				$("#btn-toggle_item_favorite").addClass('btn-favorited');
				$("#btn-toggle_item_favorite").html('Sudah Difavoritkan');
			}
			else { // if (data == "0")
				$("#btn-toggle_item_favorite").removeClass('btn-favorited');
				$("#btn-toggle_item_favorite").html('Tambah ke Favorit');
			}
		}
	});
}