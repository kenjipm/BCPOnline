function select_brand()
{
	var brands = $("[name='brand_list[]']");
	console.log(brands);
	brands.forEach(function(item, i){
		console.log(item);
		
	});
	console.log(brands[0].value);
}