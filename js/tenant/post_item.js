
function input_order(){
	document.getElementById("choose_type_button").style.display = 'none';
	document.getElementById("choose_order").style.display = 'block';
	
	document.getElementsByName("posted_item_description")[1].value = '';
}

function input_repair(){
	document.getElementById("choose_type_button").style.display = 'none';
	document.getElementById("choose_repair").style.display = 'block';
	
	document.getElementsByName("posted_item_name")[0].value = '';
	document.getElementsByName("price")[0].value = 25000;
	document.getElementsByName("unit_weight")[0].value = 0;
	document.getElementsByName("image_one_name")[0].value = '';
	document.getElementsByName("category_id")[0].value = '';
	document.getElementsByName("brand_id")[0].value = '';
	document.getElementsByName("var_type")[0].value = '';
	document.getElementsByName("var_desc")[0].value = '';
	document.getElementsByName("quantity_available")[0].value = '';
}
