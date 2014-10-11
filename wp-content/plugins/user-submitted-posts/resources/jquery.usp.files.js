/* 
	User Submitted Posts > JavaScript > Files
	@ http://perishablepress.com/user-submitted-posts/
*/
jQuery(document).ready(function($) {
	// check min files
	$('#usp_form').submit(function(e) { 
		usp_check_files(e); 
	});
	$('.usp-required-file').change(function() { 
		// usp_check_files(); 
	});
	function usp_check_files(e) {
		var n = $('.usp-clone').length;
		var y = parseInt($('#usp-max-images').val());
		$('.usp-required-file').each(function() {
			if ($.trim($(this).val()).length == 0) {
				if (e) e.preventDefault();
				$('.usp-files-error').remove();
				$(this).removeClass('parsley-success');
				$(this).addClass('parsley-error');
				$('#usp_add-another').hide();
				$('#user-submitted-image').after('<ul class="usp-files-error parsley-errors-list filled"><li class="parsley-required">File(s) required.</li></ul>');
			} else {
				$('.usp-files-error').remove();
				$(this).removeClass('parsley-error');
				$(this).addClass('parsley-success');
				if (n < y) $('#usp_add-another').show();
			}
		});
	}
});
