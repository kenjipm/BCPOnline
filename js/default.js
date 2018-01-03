var base_url = "/BCPOnline";

var popup = {
	open: function(popup_id) {
		$("#overlay, #"+popup_id).fadeIn(250);
	},
	close: function(popup_id) {
		$("#overlay, #"+popup_id).fadeOut(250);
	}
}