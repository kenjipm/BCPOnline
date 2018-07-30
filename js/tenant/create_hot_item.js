function hot_item_do() {
	var price = document.getElementById("promo_price_str").value;
	if (confirm("Ajukan produk untuk menjadi hot item dengan harga Rp " + price + " ?")) {
		$("#form-hot_item").submit();
	}
}