function choose_winner(bidding_live_id)
{
	$.ajax ({
		type: 'post',
		url: base_url + "/bidding_live/ajax_create_billing",
		data:
		{
			bidding_live_id : bidding_live_id
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