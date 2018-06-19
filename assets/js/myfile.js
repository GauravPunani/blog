$(document).ready(function () {
	console.log('file working');
	$('#form_body').keypress(function (e) {
 		var key = e.which;
 		console.log(key)
		 if(key == 13)  // the enter key code
		 {
		 	console.log('key pressed');
	    	$data=$('#form_body').val();
	    	$("#form_body").val($data+"<br>");
  		}
});   
});