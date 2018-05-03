$(document).ready(function(){
	$("#report_type").change(function(){
		update_tenant_option();
	});
	update_tenant_option();
});

function update_tenant_option()
{
	var report_type = $("#report_type").val();
	var tenant_opt = $("#tenant_opt-" + report_type).val();
	if (tenant_opt == "1") {
		$("#tenant_opt").css("display", "flex");
	} else {
		$("#tenant_opt").css("display", "none");
		// $("#tenant_id").val('0');
	}
}

function view_report() {
	var report_type = $("#report_type").val();
	var tenant_id = $("#tenant_id").val();
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/admin/get_report/",
		data:
		{
			report_type	: report_type,
			tenant_id	: tenant_id,
			start_date	: start_date,
			end_date	: end_date,
		},
		success: function(result) {
			if (result.code == "1") {
				
				
				$("#report_area").html(result.view);
			}
			else if (result.code == "0") {
				alert("Terjadi kesalahan, silakan coba lagi");
			}
		}
	});
}