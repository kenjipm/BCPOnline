function toggle_tenant_favorite(tenant_id) {
	$.ajax({
		type: "POST",
		url: "../customer/toggle_tenant_favorite/",
		data:
		{
			tenant_id: tenant_id
		},
		success: function(data) {
			if (data == "1") {
				$("#btn-toggle_tenant_favorite").addClass('btn-favorited');
				$("#btn-toggle_tenant_favorite").html('Sudah Diikuti');
			}
			else { // if (data == "0")
				$("#btn-toggle_tenant_favorite").removeClass('btn-favorited');
				$("#btn-toggle_tenant_favorite").html('Ikuti');
			}
		}
	});
}