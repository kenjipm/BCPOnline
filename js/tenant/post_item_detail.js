var i = 0;

function set_nego_price(){
	var newdiv = document.createElement('div');
	newdiv.innerHTML = 	"<div class='form-group'>"
							+"<label class='control-label col-xs-3'>ID Customer:</label>"
							+"<div class='col-xs-9'><input id='customer_id_"+i+"'type='text' class='form-control'></div>"
						+"</div>"
						+"<div class='form-group'>"
							+"<label class='control-label col-xs-3'>Harga Diskon:</label>"
							+"<div class='col-xs-9'><input id='discounted_price_"+i+"'type='text' class='form-control'></div>"
						+"</div>";
	if (i == 0)
	{
		document.getElementById("add_customer").style.display = '';
	} else
	{
		document.getElementById("add_customer").appendChild(newdiv);
	}
	i++;
}
