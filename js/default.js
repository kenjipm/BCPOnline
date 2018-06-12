var base_url = "/BCPOnline";

var popup = {
	open: function(popup_id) {
		var cur_opacity = parseFloat($("#overlay").css("opacity"));
		$("#"+popup_id).fadeIn(250);
		if (cur_opacity < 0.5) $("#overlay").fadeIn(250);
		$("#overlay").css("opacity", cur_opacity + 0.25);
	},
	close: function(popup_id) {
		var cur_opacity = parseFloat($("#overlay").css("opacity"));
		$("#"+popup_id).fadeOut(250);
		if (cur_opacity < 0.5) $("#overlay").fadeOut(250);
		$("#overlay").css("opacity", cur_opacity - 0.25);
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
	
	$(".image_zoomable").click(function(){
		$("#image_zoomed").attr('src', $(this).attr('src'));
		popup.open('popup_image_zoomed');
	});
	
	// $(".input_thousand_separator").load(function(){
	// alert("tes");
		// // var real_id = $(this).attr("real_id");
		// // $("#"+real_id).hide();
		// to_thousand_separator();
	// });
	$(".input_thousand_separator").keyup(function(){
		var value = $(this).val();
		value = value.replace(/\D+/g, ''); // replace all non-digit
		
		if (isNaN(value) || (value == "")){
			value = 0;
			$(this).val(0);
		}
		else
		{
			value = parseInt(value);
		
			value = "" + value;
			value = value.split("");
			value = value.reverse();
			var result = "";
			value.forEach(function(c, i) {
				if ((i > 0) && (i % 3 == 0)) {
					result += ".";
				}
				result += c;
			});
			result = result.split("");
			result = result.reverse();
			result = result.join("");
			
			$(this).val(result);
			
			value = value.reverse();
			value = value.join("");
		}
		var real_id = $(this).attr("realid");
		$("#"+real_id).val(value);
		
	});
	
	$(".input_number").keyup(function(){
		var value = $(this).val();
		value = value.replace(/\D+/g, ''); // replace all non-digit
		
		if (isNaN(value) || (value == "")){
			value = 0;
			$(this).val(0);
		}
		else
		{
			value = parseInt(value);
			$(this).val(value);
		}
		
		
	});
	
	$("#btn-address_add").prop("disabled", true);
	$("#address_detail").change(function(){
		check_address_detail();
	});
	$("#address_detail").keyup(function(){
		check_address_detail();
	});
	
	// $("img").on("error", function(){
		// // Replacing image source
		// $(this).attr('src', base_url + '/img/default_image.png');
	// });
});

$(document).bind("ajaxSend", function(){
	$("#loading").show();
}).bind("ajaxComplete", function(){
	$("#loading").hide();
});

function check_address_detail() {
	var address_detail = $("#address_detail").val();
	if (address_detail != "") {
		$("#btn-address_add").prop("disabled", false);
	} else {
		$("#btn-address_add").prop("disabled", true);
	}
}

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