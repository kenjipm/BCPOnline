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
	
	var category_opt = $("#category_opt-" + report_type).val();
	if (category_opt == "1") {
		$("#category_opt").css("display", "flex");
	} else {
		$("#category_opt").css("display", "none");
	}
	
	var brand_opt = $("#brand_opt-" + report_type).val();
	if (brand_opt == "1") {
		$("#brand_opt").css("display", "flex");
	} else {
		$("#brand_opt").css("display", "none");
		// $("#brand_id").val('0');
	}
	
	var keywords_opt = $("#keywords_opt-" + report_type).val();
	if (keywords_opt == "1") {
		$("#keywords_opt").css("display", "flex");
	} else {
		$("#keywords_opt").css("display", "none");
		// $("#keywords_id").val('0');
	}
}

function view_report() {
	$("#button_print").css("display", "none");
	
	var report_type = $("#report_type").val();
	var tenant_id = $("#tenant_id").val();
	var category_id = $("#category_id").val();
	var brand_id = $("#brand_id").val();
	var keywords = $("#keywords").val();
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
	
	$.ajax({
		type: "POST",
		url: base_url + "/admin/get_report/",
		data:
		{
			report_type	: report_type,
			tenant_id	: tenant_id,
			category_id	: category_id,
			brand_id	: brand_id,
			keywords	: keywords,
			start_date	: start_date,
			end_date	: end_date,
		},
		success: function(result) {
			if (result.code == "1") {
				$("#report_area").html(result.view);
				
				$("#cur_report_type").val(report_type);
				$("#cur_tenant_id").val(tenant_id);
				$("#cur_category_id").val(category_id);
				$("#cur_brand_id").val(brand_id);
				$("#cur_keywords").val(keywords);
				$("#cur_start_date").val(start_date);
				$("#cur_end_date").val(end_date);
				$("#report_html").val(result.view);
				
				$("#button_print").css("display", "inline-block");
			}
			else if (result.code == "0") {
				alert("Terjadi kesalahan, silakan coba lagi");
			}
		}
	});
}

function print_report() {
	$("#form_print").submit();
}