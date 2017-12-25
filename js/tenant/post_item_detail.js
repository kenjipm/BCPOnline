var i = 0;

function set_nego_price(){
	var newdiv = document.createElement('div');
	newdiv.innerHTML = 	"<div class='form-group'>"
							+"<label class='control-label col-xs-3'>Email Customer:</label>"
							+"<div class='col-xs-9'><input name='customer_email[]' type='text' class='form-control'></div>"
						+"</div>"
						+"<div class='form-group'>"
							+"<label class='control-label col-xs-3'>Harga Diskon:</label>"
							+"<div class='col-xs-9'><input id='discounted_price[]'type='text' class='form-control'></div>"
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
