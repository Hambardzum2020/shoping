jQuery(document).ready(function($) {

	$.ajax({
		url: "../../server.php",
		type: "post",
		data: {action: "showProducts"},
		success: function(products){
			products = JSON.parse(products);
				products.forEach(function(item){
				$("#show").append(`
					<div class="col-lg-3 col-sm-6">
	                    <div class="product-item">
	                        <div class="pi-pic">
	                            <img width="300" height="350" src="../../${item.picture}" alt="">
	                            <div class="pi-links">
	                                <button id="removeProduct" value="${item.id}" class="btn btn-info"><img width="20" height="20" src="https://cdn.iconscout.com/icon/premium/png-512-thumb/delete-1432400-1211078.png">
	                                	<span class="pointer">Remove</span>
	                                </button>  
	                                <button id="editProduct" value="${item.id}" class="btn btn-info"><img width="20" height="20" src="https://icons.iconarchive.com/icons/icons8/windows-8/512/Programming-Edit-Property-icon.png">
	                                	<span class="pointer">Edit</span>
	                                </button> 	                                
	                            </div>
	                        </div>
	                        <div class="pi-text">
	                            <h6>$${item.price}</h6>
	                            <p>${item.name}</p>
	                        </div>
	                    </div>
	                </div> 
				`)
			})
			console.log(products);
		}
	})

	$(document).on("click", "#removeProduct", function(){
		var productsId = $(this).val();
		$.ajax({
			url: "../../server.php",
			type: "post",
			data: {productsId, action: "removeProduct"},
			success: function(r){
				location.reload();
			}
		})
	});

	$(document).on("click", "#editProduct", function(){
		var productsId = $(this).val();
		$.ajax({
			url: "../../server.php",
			type: "post",
			data: {productsId, action: "getEditProduct"},
			success: function(r){
				location.href = "../editProducts/editProduct.php"
			}
		})
	});
})