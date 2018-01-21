function create_tenant_pay_receipt(tenant_id)
{
	$.ajax({
		type: "POST",
		url: base_url + "/admin/create_tenant_pay_receipt",
		data:
		{
			tenant_id: tenant_id
		},
		success: function(data) {
			var tnt_paid_receipt_id = parseInt(data);
			
			if (!isNaN(tnt_paid_receipt_id)) {
				$("#tnt_paid_receipt_id-" + tenant_id).val(tnt_paid_receipt_id);
				$("#form_print-" + tenant_id).submit();
			}
			else {
				
			}
		}
	});
}