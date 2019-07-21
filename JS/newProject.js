$(document).ready(function(){
    var formInputs = $('input[type=text], textarea, select, input[type=password],input[type=email]');
	formInputs.focus(function() {
       $(this).parent().children('.formLabel').addClass('formTop');
	});
	formInputs.focusout(function() {
		if ($.trim($(this).val()).length == 0){
		$(this).parent().children('.formLabel').removeClass('formTop');
		}
	});
	$('.formLabel').click(function(){
		 $(this).parent().children('.form-style').focus();
	});
});