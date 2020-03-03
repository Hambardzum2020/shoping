<?php 
    session_start(); 
    if(isset($_SESSION['getEditProduct'])){
        $getEditProduct = $_SESSION['getEditProduct'];
    }
    else{
        header('location: ../showProducts/showProducts.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Products</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
    
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">Edit Products</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../admin.php">Home</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="../showProducts/showProducts.php">See Product</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../addProducts/addProduct.php">Add Product</a>
                </li>                
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="../workers/workers.php">Workers</a>
                </li>                                                              
            </ul>

        </div>
    </div>
</nav>
<br><br>






<div class="wrapper fadeInDown">
  <div id="formContent">
  	<div>
      <input type="text" id="editName" class="fadeIn second" name="productname" value=<?php print $getEditProduct["name"] ?>>
      <br><br>
      <input type="text" id="editPrice" class="fadeIn second" name="price" value=<?php print $getEditProduct["price"] ?>>
      <br><br>
      <button class="fadeIn fourth btn btn-info" id="editProduct" name="editproduct" value=<?php print $getEditProduct["id"] ?> >Edit
      </button>
    </div>
    <div id="formFooter">
      <a class="underlineHover" href="../SignIn/signIn.php">Delete Product</a>
    </div>

  </div>
</div>





</body>
	<script>
		jQuery(document).ready(function($) {
			$("#editProduct").on("click", function(){
				var editName = $("#editName").val();
				var editPrice = $("#editPrice").val();
				var productId = $(this).val();
				$.ajax({
					url: "../../server.php",
					type: "post",
					data: {editName, editPrice, productId, action: "edit"},
					success: function(r){
						location.href = "../showProducts/showProducts.php";
					}
				})				
			})
		})
	</script>
</html>	