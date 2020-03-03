jQuery(document).ready(function($) {

	$.ajax({
		url: "../../server.php",
		type: "post",
		data: {action: "showWorkers"},
		success: function(workers){
			workers = JSON.parse(workers);
				workers.forEach(function(item){
					$("#showWorkers").append(`
						<div class="col-lg-3 col-sm-6">
		                    <div class="product-item">
		                        <div class="pi-pic">
		                        <div class="name">
		                        	<h3>${item.name + " " + item.surname}</h3>
		                        </div>
		                        <div class="img">	
		                            <img width="100%" src="../../${item.picture}" alt="">
		                        </div> 
									<button id="removeWorkers" value="${item.id}" class="btn btn-info"><img width="20" height="20" src="https://cdn.iconscout.com/icon/premium/png-512-thumb/delete-1432400-1211078.png">
	                                	<span class="pointer">Remove</span>
	                                </button>
		                        </div>
		                        <div class="pi-text">
		                            <h6>$${item.salary}</h6>
		                            <p>${item.specialist}</p>
		                        </div>
		                    </div>
		                </div>
					`)
				})
		}
	})

	$(document).on("click", "#removeWorkers", function(){
		var workersId = $(this).val();
		$.ajax({
			url: "../../server.php",
			type: "post",
			data: {workersId, action: "removeWorkers"},
			success: function(r){
				location.reload();
			}
		})
	});


})