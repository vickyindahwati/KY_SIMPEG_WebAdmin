// Untuk Radio Button
$.metadata.setType("attr", "validate");
$(document).ready(function() {
	// validate signup form on keyup and submit
	$(".gbiform").validate({
		
		// Some hack untuk radiofield :P
        errorPlacement: function (error, element) {
           error.insertAfter(element);
        },
		// Some hack untuk radiofield :P
        showErrors: function (errorMap, errorList) {
            this.defaultShowErrors();
            if ($(this.currentForm).find('label.error').css('display') === 'block') {
                $(this.currentForm).find('label.error').css('display', 'block');
            } 
        },
	});

});