$(document).ready(function(){
	ro_calculate_fee_from_store();
		
	$("[id|=delivery_method]").change(function(){
		ro_calculate_fee_from_store();
	});
	
	$("#fee_amount").change(function(){
		update_fee();
	});
});

function ro_calculate_fee_from_store() {
	var courier = $("[name=delivery_method]:checked").val();
	var weight = $("#total_weight").val();
	var destination = $("#ro_city_id").val();
	
	$.ajax({
		type: "GET",
		url: base_url + "/customer/ro_calculate_fee_from_store/",
		data:
		{
			courier: courier,
			weight: weight,
			destination: destination,
		},
		success: function(data) {
			if (data != "") {
				$("#fee_amount").html("");
				data.forEach(function(courier, idx){
					courier.costs.forEach(function(service, jdx){
						var option_html = "<option value='" + service.cost[0].value + "'>" + courier.name + " - " + service.service + " (" + service.description + ", " + service.cost[0].etd + " Hari Kerja)</option>";
						$("#fee_amount").append(option_html);
						update_fee();
					});
				});
			}
			else alert('Gagal mendapatkan informasi ongkos kirim, silakan muat ulang halaman');
		}
	});
}

function update_fee() {
	var fee_amount_str = price_format($("#fee_amount option:selected").val());
	$("#fee_amount_str").html(fee_amount_str);
}

function price_format(to_rupiah)
{
	to_rupiah = to_rupiah.replace(/\./g, '');
	to_rupiah = parseInt(to_rupiah);
	to_rupiah = "Rp " + to_rupiah.toLocaleString('id-ID');
	
	return to_rupiah;
}