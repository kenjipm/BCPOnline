$(document).ready(function(){
	$("#ro_province_id").change(function(){
		update_province_name();
	});
	
	$("#ro_city_id").change(function(){
		update_city_name();
	});
	
	ro_get_province();
});

function update_province_name() {
	$("#province").val($("#ro_province_id option:selected").text());
	ro_get_city($("#ro_province_id").val());
}

function update_city_name() {
	$("#city").val($("#ro_city_id option:selected").text());
}

function ro_get_province() {
	$.ajax({
		type: "GET",
		url: base_url + "/customer/ro_get_province/",
		data:
		{
			
		},
		success: function(data) {
			if (data != "") {
				$("#ro_province_id").html("");
				data.forEach(function(item, idx){
					var option_html = "<option value='" + item.province_id + "'>" + item.province + "</option>";
					$("#ro_province_id").append(option_html);
				});
				update_province_name();
			}
			else alert('Gagal mendapatkan daftar provinsi, silakan muat ulang halaman');
		}
	});
}

function ro_get_city(province_id) {
	$.ajax({
		type: "GET",
		url: base_url + "/customer/ro_get_city/",
		data:
		{
			province_id: province_id
		},
		success: function(data) {
			if (data != "") {
				$("#ro_city_id").html("");
				data.forEach(function(item, idx){
					var option_html = "<option value='" + item.city_id + "'>" + item.type + " " + item.city_name + "</option>";
					$("#ro_city_id").append(option_html);
					update_city_name();
				});
			}
			else alert('Gagal mendapatkan daftar kota, silakan muat ulang halaman');
		}
	});
}