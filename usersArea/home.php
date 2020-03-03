<?php 
    session_start(); 
    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{
        header('location: ../LogIn/logIn.php');
    }
    if(isset($_SESSION["count"])){
        $counter = $_SESSION["count"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<link rel="stylesheet" href="../style.css">

    <link rel="stylesheet" href="../css/animate.css"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <style>
        #removeToCart{
            display: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html">Users: <?php print($user["username"]) ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../usersArea/cart.php">Cart <span class="sr-only">(current)</span></a>
                </li>               
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="../LogIn/logIn.php">Log Out</a>
                </li>                               
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="../usersArea/cart.php">
                    <i class="fa fa-shopping-cart"></i> Cart
                    <span id="count" class="badge badge-light"><?php print $counter  ?></span>
                </a>
            </form>
        </div>
    </div>
</nav>
<br><br>

 










<section class="product-filter-section">
        <div class="container">
            <div class="section-title">
                <h2>BROWSE TOP SELLING PRODUCTS</h2>
            </div>
            <ul class="product-filter-menu">
                <li><a href="#">TOPS</a></li>
                <li><a href="#">JUMPSUITS</a></li>
                <li><a href="#">LINGERIE</a></li>
                <li><a href="#">JEANS</a></li>
                <li><a href="#">DRESSES</a></li>
                <li><a href="#">COATS</a></li>
                <li><a href="#">JUMPERS</a></li>
                <li><a href="#">LEGGINGS</a></li>
            </ul>
            <div class="row" id="showProducts">
                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="./img/product/5.jpg" alt="">
                            <div class="pi-links">
                                <a id="addToCart" class="add-card"><img width="20" height="20" src="https://icons.iconarchive.com/icons/icons8/windows-8/512/Ecommerce-Shopping-Bag-icon.png"><span>ADD TO CART</span></a>
                                
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Product filter section end -->










<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> My company</li>
                    <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
                    <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
            </div>
        </div>
    </div>
</footer>   
</body>
    <script src="product.js"></script>

</html>