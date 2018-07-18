$(document).ready(function(){
	var is_popup_bid_success_deposit_show = $("#is_popup_bid_success_deposit_show").val();
	
	if (is_popup_bid_success_deposit_show == "1") {
		popup.open("popup_bid_success_deposit");
	}
});