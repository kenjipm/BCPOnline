function cancel_order(id)
{
	if (confirm("Batalkan order ini?")){
		$.ajax ({
			type: 'post',
			url: base_url + "/admin/cancel_order/" + id,
			data: {},
			success: function(data) {
				location.reload();
			}
		});
	}
}