$(function(){
	
	
	// -------------- uploading profile picture -------------- //
	var url_profile_pic = $('#profile_pic').data('url');
	var options_profile_pic = 
	{
		allowedExts		: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif"],
		allowedTypes	: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],
		maxFileSize		: 204800, //200KB in bytes
		name			: 'profile_pic',
		start: function(file){
			//upload started
			$('#thumbnail-profile_pic').html("<div class='loader'></div>");
		},
		progress: function(progress){
			//received progress
		},
		success: function(data){
			//upload successful
			$('#thumbnail-profile_pic').html("<img src='" + data.image_url + "?t=" + new Date().getTime() + "' alt='' style='width:100%' />");
		},
		error: function(error){
			//upload faile
			$('#thumbnail-profile_pic').html("Failure!<br>" + error.name + ": " + error.message);
		}
	};
	$('#profile_pic').change(function(){
		$(this).simpleUpload(url_profile_pic, options_profile_pic);
	});
	
	
	
	// -------------- uploading identification picture -------------- //
	var url_idpic = $('#identification_pic').data('url');
	var options_idpic = 
	{
		allowedExts		: ["jpg", "jpeg", "jpe", "jif", "jfif", "jfi", "png", "gif"],
		allowedTypes	: ["image/pjpeg", "image/jpeg", "image/png", "image/x-png", "image/gif", "image/x-gif"],
		maxFileSize		: 204800, //200KB in bytes
		name			: 'identification_pic',
		start: function(file){
			//upload started
			$('#thumbnail-identification_pic').html("<div class='loader'></div>");
		},
		progress: function(progress){
			//received progress
		},
		success: function(data){
			//upload successful
			$('#thumbnail-identification_pic').html("<img src='" + data.image_url + "?t=" + new Date().getTime() + "' alt='' style='width:100%' />");
		},
		error: function(error){
			//upload faile
			$('#thumbnail-identification_pic').html("Failure!<br>" + error.name + ": " + error.message);
		}
	};
	$('#identification_pic').change(function(){
		$(this).simpleUpload(url_idpic, options_idpic);
	});
	
	
});