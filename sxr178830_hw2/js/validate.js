$(document).ready(function() {
	//Enter the span element when the file is loaded and hiding it
	($( "<span></span>").insertAfter("#username")).css('visibility','hidden');;
	($( "<span></span>").insertAfter("#password")).css('visibility','hidden');;
	($( "<span></span>").insertAfter("#email")).css('visibility','hidden');
	//changing the class of the selected textbox
	$( "#username, #password,#email" ).focus(function() {
    	$(this).toggleClass('info');

});
	//performing validation of the username text field
	$("#username").blur(function(value) {
		$(this).toggleClass();
    	if( $(this).val().length > 0 ) {
    		 
    	    var username = $(this).val();
		    var usernameCheck = /^[A-Za-z0-9]+$/.test(username);
		    if(usernameCheck){
		    	$(this).toggleClass('ok').next().html(" OK").css('visibility','visible');
		    	$(this).show();


		    }
		    else{
		    	$(this).toggleClass('error').next().html(" ERROR:- This field can contain only letters and numbers").css('visibility','visible');
		    }	
	}
});

//performing validation of the password text field
	$("#password").blur(function(){
		$(this).toggleClass();
		if( $(this).val().length > 0 ) {
    		 
    	    var password = $(this).val();
    	    var length =password.length;
   		    if(length>8){
		    	$(this).toggleClass('ok').next().html(" OK").css('visibility','visible');
		    	$(this).show();


		    }
		    else{
		    	$(this).toggleClass('error').next().html(" ERROR:- password must contain atleast 8 characters").css('visibility','visible');
		    }	
	}



	});
	//performing validation of the email text field
	$("#email").blur(function(){
		$(this).toggleClass();

		if( $(this).val().length > 0 ) {
    		 
    	    var email = $(this).val();
  			var emailCheck = /^[a-zA-Z0-9._%+-]+@[A-Z0-9a-z]+.[A-Za-z]{2,4}$/.test(email);
   		    if(emailCheck){
		    	$(this).toggleClass('ok').next().html(" OK").css('visibility','visible');
		    	$(this).show();


		    }
		    else{
		    	$(this).toggleClass('error').next().html(" ERROR:- Please enter a valid email id").css('visibility','visible');
		    }	
	}

	});
});
