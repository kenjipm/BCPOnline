var bidding_step = 0;
var bidding_cur_price = 0;
var bidding_min_price = 0;

var TICK_COUNT_REFRESH = 5;

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

function render_bid_time_left_live(bid_time_left, second_wait)
{
	setTimeout(function(){
		var hour_left = Math.floor(bid_time_left / 3600);
		var minute_left = Math.floor((bid_time_left % 3600) / 60);
		var second_left = bid_time_left % 3600 % 60;
		
		var bid_time_left_live = hour_left + ":" + minute_left + ":" + second_left;
		// console.log(bid_time_left);
		$("#bid_time_left_live").html(bid_time_left_live);
	}, second_wait * 1000);
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
				
			}
			
			if (data.bid_time_left != "0") {
				var bid_time_left = parseInt(data.bid_time_left);
				if (bid_time_left > 0) {
					for (var i = 0; i < TICK_COUNT_REFRESH; i++) {
						render_bid_time_left_live(bid_time_left - i, i);
					}
				} else { // kalo abis waktu
					location.reload();
				}
			}
			
			setTimeout(update_price_live, TICK_COUNT_REFRESH * 1000);
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
					//window.location = base_url + '/bidding_live';
					popup.open('popup_bid_deposit');
				}
				else if (data.code == "1") {
					// $("#btn-bid_sub").prop("disabled", true);
					// $("#btn-bid_add").prop("disabled", true);
					// $("#btn-submit_bid").prop("disabled", true);
					// $("#bidding_status").html("Bidding berhasil dipasang");
					$("#bid_win_price").html(data.bid_win_price);
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