var bidding_step = 0;
var bidding_cur_price = 0;
var bidding_min_price = 0;

$(document).ready(function(){
	bidding_cur_price = parseInt($("#bidding_cur_price").val());
	bidding_step = parseInt($("#bidding_step").val());
	 
	bidding_min_price = bidding_cur_price + bidding_step;
	
	update_price_live();
	
	bidding_next_price_format();
	
	$("#bidding_next_price_str").change(function(){
		bidding_next_price_format();
	});
});

function bidding_next_price_format(step=0)
{
	var price = $("#bidding_next_price_str").val();
	price = price.replace(/\./g, '');
	price = parseInt(price) + parseInt(step);
	
	$("#bidding_next_price").val(price);
	
	price = price.toLocaleString('id-ID');
	$("#bidding_next_price_str").val(price);
}

function update_price_live()
{
	var bidding_item_id = $("#bidding_item_id").val();
	$.ajax({
		type: "POST",
		url: base_url + "/bidding_live/ajax_get_cur_price",
		data:
		{
			bidding_item_id: bidding_item_id
		},
		success: function(data) {
			if (data.success == "1") {
				
				var bidding_next_price = $("#bidding_next_price").val();
				
				bidding_cur_price = parseInt(data.cur_price);
				bidding_cur_price_str = data.cur_price_str;
				bidding_min_price = bidding_cur_price + bidding_step;
				
				$("#bidding_cur_price").val(bidding_cur_price);
				$("#bidding_cur_price_str").html(bidding_cur_price_str);
				
				if (bidding_next_price < bidding_cur_price) {
					$("#bidding_next_price").val(bidding_cur_price + bidding_step);
				}
			} else {
				
			}
				
			setTimeout(update_price_live, 3000);
		}
	});
}

function bid_add_do()
{
	var bidding_next_price = parseInt($("#bidding_next_price").val()) + bidding_step; 
	$("#bidding_next_price").val(bidding_next_price);
	bidding_next_price_format(bidding_step);
}

function bid_sub_do()
{
	var bidding_next_price = parseInt($("#bidding_next_price").val()) - bidding_step;
	if (bidding_next_price >= bidding_min_price) {
		$("#bidding_next_price").val(bidding_next_price);
		bidding_next_price_format(-bidding_step);
	}
}

function submit_bid()
{
	var bidding_item_id = $("#bidding_item_id").val();
	var bidding_next_price = $("#bidding_next_price").val();
	if (confirm("Apakah kamu yakin untuk memasang harga " + bidding_next_price + " untuk barang ini?"))
	{
		$.ajax({
			type: "POST",
			url: base_url + "/customer/bid_live_post_do/",
			data:
			{
				bidding_item_id: bidding_item_id,
				bidding_next_price: bidding_next_price
			},
			success: function(data) {
				if (data.code == "0") {
					$("#bidding_status").html("Gagal memasang harga");
				}
				else if (data.code == "-1") {
					$("#bidding_status").html("Barang tidak ditemukan");
				}
				else if (data.code == "-2") {
					$("#bidding_status").html("Barang tidak dapat dilelang");
				}
				else if (data.code == "-3") {
					$("#bidding_status").html("Pelelangan barang ini sudah selesai");
				}
				else if (data.code == "-4") {
					$("#bidding_status").html("Harga salah");
				}
				else if (data.code == "-5") {
					$("#bidding_status").html("Kamu sudah memasang harga");
				}
				else if (data.code == "-9") {
					// $("#bidding_status").html("Harap lakukan deposit terlebih dahulu");
					window.location = base_url + '/bidding_live';
				}
				else if (data.code == "1") {
					// $("#btn-bid_sub").prop("disabled", true);
					// $("#btn-bid_add").prop("disabled", true);
					// $("#btn-submit_bid").prop("disabled", true);
					// $("#bidding_status").html("Bidding berhasil dipasang");
					$("#bid_time_left").html(data.bid_time_left);
					popup.open('popup_bid_success');
				}
				else { // kalau blm daftar customer
					window.location = base_url + '/login' + '?return_url=' + window.location.href;
				}
			}
		});
	}
}

function dummy_deposit_done()
{
	$.ajax({
		type: "POST",
		url: base_url + "/customer/dummy_deposit_done/",
		data:
		{
			
		},
		success: function(data) {
			if (data == "1") location.reload();
			else alert('gagal');
		}
	});
}