var TICK_COUNT_REFRESH_FLASH = 5;

$(document).ready(function(){
	update_flash_time();
});

function render_flash_time_left(flash_time_left, second_wait)
{
	setTimeout(function(){
		var hour_left = Math.floor(flash_time_left / 3600);
		var minute_left = Math.floor((flash_time_left % 3600) / 60);
		var second_left = flash_time_left % 3600 % 60;
		
		var flash_time_left_str = hour_left + ":" + minute_left + ":" + second_left;
		// console.log(flash_time_left);
		$("#flash_time_left").html(flash_time_left_str);
	}, second_wait * 1000);
}

function update_flash_time()
{
	$.ajax({
		type: "POST",
		url: base_url + "/item/ajax_get_flash_time_left",
		data:
		{
			
		},
		success: function(data) {
			if (data.success == "1") {
				if (data.flash_time_left != "0") {
					var flash_time_left = parseInt(data.flash_time_left);
					if (flash_time_left > 0) {
						for (var i = 0; i < TICK_COUNT_REFRESH_FLASH; i++) {
							render_flash_time_left(flash_time_left - i, i);
						}
					} else { // kalo abis waktu
						location.reload();
					}
				}
				
				setTimeout(update_flash_time, TICK_COUNT_REFRESH_FLASH * 1000);
			}
		}
	});
}