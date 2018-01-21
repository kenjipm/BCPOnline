var base_url = "/BCPOnline";

function container_print()
{
	var header_html = "";
	var footer_html = "";
	
	// get header print html data
	$.ajax({
		type: "GET",
		url: base_url + "/admin/get_header_print/",
		success: function(data) {
			header_html = data;
	
			// get footer print html data
			$.ajax({
				type: "GET",
				url: base_url + "/admin/get_footer_print/",
				success: function(data) {
					footer_html = data;
					
					// print
					if ((header_html != "") && (footer_html != ""))
					{
						var print_html = header_html + $("#container_print").html() + footer_html;
						var print_window = window.open('','','width=auto,height=auto');
						
						print_window.document.write(print_html);
						print_window.document.close();
						print_window.focus();
						setTimeout(function(){
							print_window.print();
							print_window.close();
						}, 100);
						
						// $("#print_frame").html(print_html);	
						// window.frames["print_frame"].document.open();
						// window.frames["print_frame"].document.write(print_html);
						// window.frames["print_frame"].document.close();
						// window.frames["print_frame"].window.focus();
						// window.frames["print_frame"].window.print();
					}
				}
			});
		}
	});
}

// var print_window = window.open('','','width=200,height=100');
    // print_window.document.write("<p>This is 'myWindow'</p>");
    
    // print_window.document.close();
	// print_window.focus();
	// print_window.print();
	// print_window.close();