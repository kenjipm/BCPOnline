
function input_order(){
	document.getElementById("choose_type_button").style.display = 'none';
	document.getElementById("choose_order").style.display = 'block';
}

function input_repair(){
	document.getElementById("choose_type_button").style.display = 'none';
	document.getElementById("choose_repair").style.display = 'block';
	
	$("#div_variance").find("[name='var_desc[]']").attr("value", '');
	$("#div_variance").find("[name='quantity_available[]']").attr("value", '');
}