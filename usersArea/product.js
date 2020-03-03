jQuery(document).ready(function($) {

	$.ajax({
		url: "../server.php",
		type: "post",
		data: {action: "showProducts"},
		success: function(products){
			products = JSON.parse(products);
			products.forEach(function(item){
				$("#showProducts").append(`
					<div class="col-lg-3 col-sm-6">
	                    <div class="product-item">
	                        <div class="pi-pic">
	                            <img width="300" height="350" src="../${item.picture}" alt="">
	                            <div class="pi-links">
	                                <button value="${item.id}" id="addToCart" class="btn"><a class="add-card">
	                                			<img width="20" height="20" src="https://icons.iconarchive.com/icons/icons8/windows-8/512/Ecommerce-Shopping-Bag-icon.png">
	                                			<span>ADD TO CART</span>
	                                		</a>
	                                </button>
	                                <button value="${item.id}" id="removeToCart" class="btn"><a class="add-card">
	                                			<img width="20" height="20" src="https://cdn.iconscout.com/icon/premium/png-512-thumb/delete-1432400-1211078.png">
	                                			<span>ADD TO CART</span>
	                                		</a>
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
			});
		}
	})

	$(document).on("click", "#addToCart", function(){
		var productId = $(this).val();
		$.ajax({
			url: "../server.php",
			type: "post",
			data: {productId, action: "addToCart"},
			success: function(r){
				r = JSON.parse(r);
				if(r[0] == "true"){
					alert("The product has succsesfully added in the basket.");
				}
				else{
					alert("This product is already in the basket.")
				}
				$("#count").html(r[1]);
			}
		})
		
	})

	$("#logout").on("click", function(){
		$.ajax({
			url: "server.php",
			type: "post",
			data: {action: "logout"},
			success: function(r){
				
			}
		});
	});



})