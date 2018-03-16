function choose_winner(bidding_id)
{
	$.ajax ({
		type: 'post',
		url: base_url + "/bidding/ajax_create_billing",
		data:
		{
			bidding_id : bidding_id
		},
		success: function(data) {
			if (data == "-1"){
				alert("Bidding Tidak Ditemukan");
			} else if (data == "-2"){
				alert("Barang Tidak Ditemukan");
			} else if (data == "-3"){
				alert("Varian Tidak Ditemukan");
			} else if (data == "1"){
				alert("Pemenang Berhasil Ditentukan");
				$(".button_winner").remove();
			} else {
				alert("Unknown Error");
			}
		}
	});
}