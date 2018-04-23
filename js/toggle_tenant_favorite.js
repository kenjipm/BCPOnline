function toggle_tenant_favorite(tenant_id) {
	$.ajax({
		type: "POST",
		url: base_url + "/customer/toggle_tenant_favorite/",
		data:
		{
			tenant_id: tenant_id
		},
		success: function(data) {
			if (data == "1") {
				$("#btn-toggle_tenant_favorite").addClass('cb-button-secondary-selected');
				$("#btn-toggle_tenant_favorite").removeClass('cb-button-form');
				$("#btn-toggle_tenant_favorite").html('SUDAH DIIKUTI');
			}
			else if (data == "0") {
				$("#btn-toggle_tenant_favorite").addClass('cb-button-form');
				$("#btn-toggle_tenant_favorite").removeClass('cb-button-secondary-selected');
				$("#btn-toggle_tenant_favorite").html('IKUTI');
			}
			else { // not logged in
				window.location = base_url + '/login' + '?return_url=' + window.location.href;
			}
		}
	});
}