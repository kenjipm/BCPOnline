var base_url = "/BCPOnline";

var popup = {
	open: function(popup_id) {
		$("#overlay, #"+popup_id).fadeIn(250);
	},
	close: function(popup_id) {
		$("#overlay, #"+popup_id).fadeOut(250);
	}
}

function init_hover_menu(hovered_element, menu_element) {
	$(hovered_element + ", " + menu_element).hover(function(){
		$(menu_element).show();
	}, function(){
		$(menu_element).hide();
	});
}

$(document).ready(function(){
	init_hover_menu(".navbar-cb-top-profile-photo", ".navbar-cb-top-profile-menu");
	init_hover_menu("#navbar-cb-strip-PRODUCT", ".navbar-cb-strip-product");
	// $(".navbar-cb-top-profile-photo, .navbar-cb-top-profile-menu").hover(function(){
		// $(".navbar-cb-top-profile-menu").show();
	// }, function(){
		// $(".navbar-cb-top-profile-menu").hide();
	// });
	
	// $(".navbar-cb-top-profile-photo, .navbar-cb-top-profile-menu").hover(function(){
		// $(".navbar-cb-top-profile-menu").show();
	// }, function(){
		// $(".navbar-cb-top-profile-menu").hide();
	// });
	$(".input_file_upload").on('change', select_file);

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


function select_file(event){
	var element_id = $(this).attr('id');
	var filepath = $(this).val();
	
	var fileparts = filepath.split("\\");
	var filename = "";
	if (fileparts.length > 0) {
		filename = fileparts[fileparts.length - 1];
	} else {
		filename = filepath;
	}
	// alert(filename);
	if (filename == "") { // kalau ada file nya
		$('label[for=' + element_id + '] > div').addClass('cb-icon-add-item');
		$('label[for=' + element_id + '] > div').addClass('cb-icon-md');
		$('label[for=' + element_id + '] > div').html("");
	} else {
		$('label[for=' + element_id + '] > div').removeClass('cb-icon-add-item');
		$('label[for=' + element_id + '] > div').removeClass('cb-icon-md');
		$('label[for=' + element_id + '] > div').html(filename);
	}
}