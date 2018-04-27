$(document).ready(function(){
	$(".input_file_upload").on('change', select_file);
});

var cur_var_idx = 0;

function add_variance(){ 

	// var desc = $("#var_desc").val();
	// var quantity_available = $("#quantity_available").val();
	
	// $("#div_variance").find("[name='var_desc[]']").attr("value", desc);
	// $("#div_variance").find("[name='quantity_available[]']").attr("value", quantity_available);
	
	var id_image_two = "image_two_name-" + cur_var_idx;
	$("#div_variance").find(".label_image_two").attr("for", id_image_two);
	$("#div_variance").find(".input_image_two").attr("id", id_image_two);
	
	var id_image_three = "image_three_name-" + cur_var_idx;
	$("#div_variance").find(".label_image_three").attr("for", id_image_three);
	$("#div_variance").find(".input_image_three").attr("id", id_image_three);
	
	var id_image_four = "image_four_name-" + cur_var_idx;
	$("#div_variance").find(".label_image_four").attr("for", id_image_four);
	$("#div_variance").find(".input_image_four").attr("id", id_image_four);
	
	var newdiv = $("#div_variance").html();
	
	// reset id sm for nya, biar ga dobel sm yg abis di append
	$("#div_variance").find(".label_image_two").attr("for", "");
	$("#div_variance").find(".input_image_two").attr("id", "");
	
	$("#div_variance").find(".label_image_three").attr("for", "");
	$("#div_variance").find(".input_image_three").attr("id", "");
	
	$("#div_variance").find(".label_image_four").attr("for", "");
	$("#div_variance").find(".input_image_four").attr("id", "");
	
	$("#var_desc_list").append(newdiv);
	
	$("#var_desc_list").find("#" + id_image_two).on('change', select_file);
	$("#var_desc_list").find("#" + id_image_three).on('change', select_file);
	$("#var_desc_list").find("#" + id_image_four).on('change', select_file);
	
	cur_var_idx++;
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