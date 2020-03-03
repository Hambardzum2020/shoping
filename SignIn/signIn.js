jQuery(document).ready(function($){

	$("#signIn").on("click", function(){
		var username = $("#username").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var comfirm_password = $("#comfirm_password").val();
		$.ajax({
			url: "../server.php",
			type: "post",
			data: {username, email, password, comfirm_password, action: "signIn"},
			success: function(r){
				if(r == "SignIn successfull"){
					$(".error").remove();
					location.href = "../LogIn/logIn.php"
				}
				else{
					r = JSON.parse(r);
					$(".error").remove();
					for(i in r){
						$("#" + i).after(`<p class="error" id=${"err"+ i}>${r[i]}</p>`);
					}
				}
			}
		})
	})


})