function show_posted_item_div(){
	
	document.getElementById('posted_item').style.display = 'block';
	document.getElementById('transaction').style.display = 'none';
	document.getElementById('dispute').style.display = 'none';
	document.getElementById('sold_item').style.display = 'none';
	
}

function show_transaction_div(){
	
	document.getElementById('posted_item').style.display = 'none';
	document.getElementById('transaction').style.display = 'block';
	document.getElementById('dispute').style.display = 'none';
	document.getElementById('sold_item').style.display = 'none';
	
}
function show_dispute_div(){
	
	document.getElementById('posted_item').style.display = 'none';
	document.getElementById('transaction').style.display = 'none';
	document.getElementById('dispute').style.display = 'block';
	document.getElementById('sold_item').style.display = 'none';
	
}
function show_sold_item_div(){
	
	document.getElementById('posted_item').style.display = 'none';
	document.getElementById('transaction').style.display = 'none';
	document.getElementById('dispute').style.display = 'none';
	document.getElementById('sold_item').style.display = 'block';
	
}