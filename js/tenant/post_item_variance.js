var i = 0;

function add_variance(){
	var desc = document.getElementsByName("var_desc")[0].value;
	var quantity_available = document.getElementsByName("quantity_available")[0].value;
	var image_two = document.getElementsByName("image_two_name")[0].value;
	var image_three = document.getElementsByName("image_three_name")[0].value;
	var image_four = document.getElementsByName("image_four_name")[0].value;
	
	var newdiv = document.createElement('div');
	newdiv.innerHTML = 	"<div class='col-xs-7 col-xs-offset-3'>"
							+"<input name='var_desc_"+i+"'type='text' class='form-control' value='"+desc+"' readonly/>"
						+"</div>"
						+"<div><input name='quantity_available_"+i+"'type='text' class='form-control' value='"+quantity_available+"' style='display:none'/></div>"	
						+"<div><input name='image_two_name_"+i+"'type='text' class='form-control' value='"+image_two+"' style='display:none'/></div>"			
						+"<div><input name='image_three_name_"+i+"'type='text' class='form-control' value='"+image_three+"' style='display:none'/></div>"			
						+"<div><input name='image_four_name_"+i+"'type='text' class='form-control' value='"+image_four+"' style='display:none'/></div>";
	if (i == 0)
	{
		document.getElementsByName("var_desc_0")[i].value = desc;
		document.getElementsByName("quantity_available_0")[i].value = quantity_available;
		document.getElementsByName("image_two_name_0")[i].value = image_two;
		document.getElementsByName("image_three_name_0")[i].value = image_three;
		document.getElementsByName("image_four_name_0")[i].value = image_four;
	} else
	{
		document.getElementById("var_desc").appendChild(newdiv);
	}
	i++;
}
