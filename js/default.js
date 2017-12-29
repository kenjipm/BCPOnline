var popup = {
	open: function(popup_id) {
		$("#overlay, #"+popup_id).fadeIn(250);
	},
	close: function(popup_id) {
		$("#overlay, #"+popup_id).fadeOut(250);
	}
}

$(function(){
	$(".photo_upload_simple").change(function(){
		var url_upload = $(this).data('url');
		var element_name = $(this).attr('name');
		var options_upload = 
		{
			allowedExts		: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif"],
			allowedTypes	: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],
			maxFileSize		: 1048576, //1MB in bytes
			name			: element_name,
			start: function(file){
				//upload started
				$('#thumbnail-'+element_name).html("<div class='loader'></div>");
			},
			progress: function(progress){
				//received progress
			},
			success: function(data){
				//upload successful
				if (data.image_url != undefined) {
					$('#thumbnail-'+element_name).html("<img src='" + data.image_url + "?t=" + new Date().getTime() + "' alt='' style='width:100%' />");
				}
				else {
					alert(data.error);
				}
			},
			error: function(error){
				//upload fail
				alert(error.name + ": " + error.message);
			}
		};
		$(this).simpleUpload(url_upload, options_upload);
	});
});