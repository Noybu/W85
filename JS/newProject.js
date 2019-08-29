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
	var input = document.getElementById( 'file-upload' );
	
	
	//הוספת שם קובץ
	var infoArea = document.getElementById( 'file-upload-filename' );

	input.addEventListener( 'change', showFileName );

	function showFileName( event ) {
	
	// the change event gives us the input it occurred in 
	var input = event.srcElement;
	
	// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
	var fileName = input.files[0].name;
	
	// use fileName however fits your app best, i.e. add it into a div
	infoArea.textContent = 'File name: ' + fileName;
	}
});