var base_url = "/BCPOnline";

var popup = {
	open: function(popup_id) {
		$("#overlay, #"+popup_id).fadeIn(250);
	},
	close: function(popup_id) {
		$("#overlay, #"+popup_id).fadeOut(250);
	}
}

$(document).ready(function(){
	$(".date_of_birth").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-m-dd",
		minDate: "-99Y",
		maxDate: "-10Y",
		yearRange: "c-99:c+99"
	});

	$(".datepicker").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-m-dd",
	});

	$(".datetimepicker").datetimepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy-m-dd",
		timeFormat: "HH:mm:ss",
		showSecond: false,
		showMillisec: false,
		showMicrosec: false,
	});
});