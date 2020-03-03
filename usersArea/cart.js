jQuery(document).ready(function($) {
	$.ajax({
		url: "../server.php",
		type: "post",
		data: {action: "showProductsInCart"},
		success: function(products){
			products = JSON.parse(products);
			products.forEach(function(item){
				$("#showProductsInCart").append(`
					<tr>
                        <td><img src="../${item.picture}" /> </td>
                        <td>${item.name}</td>
                        <td><input class="form-control" type="text" value="1" /></td>
                        <td class="text-right">${item.price}$</td>
                        <td class="text-right"><button id="removeProductInFromCart" value="${item.id}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                    </tr> 		
				`)
			});
		}
	});

	$(document).on("click", "#removeProductInFromCart", function(){
		var productId = $(this).val();
		$.ajax({
			url: "../server.php",
			type: "post",
			data: {productId, action: "removeProductInFromCart"},
			success: function(r){
				location.reload();	
			}
		})
	});

})