jQuery(document).ready(function($){

	$("#login").on("click", function(){
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			url: "../server.php",
			type: "post",
			data: {email, password, action: "logIn"},
			success: function(r){
				if(r == "LogIn successfull"){
					$(".error").remove();
					location.href = "../usersArea/home.php"					
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