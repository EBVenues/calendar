jQuery(document).ready( function($) {
		var data = {
			action: 'test_response',
            post_var: 'eb_cal',
            ebc_nonce: the_ajax_script.nonce
		};
		
		// the_ajax_script.ajaxurl is a variable that will contain the url to the ajax processing file
	 	$.post(the_ajax_script.ajaxurl, data, function(response) {
			var clndr = {};
			var currentMonth = moment().format('YYYY-MM');
			var nextMonth    = moment().add('month', 1).format('YYYY-MM');
			
			clndr = jQuery('#full-clndr').clndr({
				template: jQuery('#full-clndr-template').html(),
				events: response,
				forceSixRows: true
			});
		
	 	});
	 	return false;
});