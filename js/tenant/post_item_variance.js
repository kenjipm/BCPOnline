
function add_variance(){ 

	var desc = $("#var_desc").val();
	var quantity_available = $("#quantity_available").val();
	var image_two = $("#image_two_name").val();
	var image_three = $("#image_three_name").val();
	var image_four = $("#image_four_name").val();
	
	$("#div_variance").find("[name='var_desc[]']").attr("value", desc);
	$("#div_variance").find("[name='quantity_available[]']").val(quantity_available);
	$("#div_variance").find("[name='image_two_name[]']").val(image_two);
	$("#div_variance").find("[name='image_three_name[]']").val(image_three);
	$("#div_variance").find("[name='image_four_name[]']").val(image_four);

	var newdiv = $("#div_variance").html();
	
	$("#var_desc_list").append(newdiv);

}
