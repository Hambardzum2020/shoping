<?php

class Shop{
	private $db;
	function __construct(){
		session_start();
		$this->db = new mysqli("localhost", "root", "", "shopingdb");
		if(isset($_POST["action"])){
			if($_POST["action"] == "signIn"){
				$this->register();
			}
			if($_POST["action"] == "logIn"){
				$this->logIn();
			}
			if($_POST["action"] == "logout"){
				$this->logout();
			}
			if($_POST["action"] == "showProducts"){
				$this->showProducts();
			}
			if($_POST["action"] == "removeProduct"){
				$this->removeProduct();
			}
			if($_POST["action"] == "getEditProduct"){
				$this->getEditProduct();
			}
			if($_POST["action"] == "edit"){
				$this->edit();
			}
			if($_POST["action"] == "showWorkers"){
				$this->showWorkers();
			}
			if($_POST["action"] == "removeWorkers"){
				$this->removeWorkers();
			}
			if($_POST["action"] == "addToCart"){
				$this->addToCart();
			}
			if($_POST["action"] == "showProductsInCart"){
				$this->showProductsInCart();
			}
			if($_POST["action"] == "removeProductInFromCart"){
				$this->removeProductInFromCart();
			}
		}
		if(isset($_POST["addproduct"])){
			$this->addProducts();
		}
		if(isset($_POST["addWorkers"])){
			$this->addWorkers();
		}				
	}

	function register(){
		$username = $_POST["username"];
		$email = $_POST["email"];
		$data = $this->db->query("SELECT * FROM users WHERE email = '$email' ")->fetch_all(true);
		$password = $_POST["password"];
		$comfirm_password = $_POST["comfirm_password"];
		$errors = [];
		if(empty($username)){
			$errors["username"] = "*Wite your username.";
		}
		else if(!preg_match("/^[a-zA-Z ]*$/", $username)){
			$errors["username"] = "*Only letters and white space allowed";
		}

		if(empty($email)){
			$errors["email"] = "*Write your email adress.";
		}
		else if(!filter_var($email)){
			$errors["email"] = "*Invalid email format";
		}
		else if(count($data) > 0){
			$errors["email"] = "*arden grancvac ka";
		}

		if(empty($password)){
			$errors["password"] = "*Write password";
		}	
		else if(strlen($password) < '6'){
			$errors["password"] = "*6";
		}


		if(empty($comfirm_password)){
			$errors["comfirm_password"] = "*Write comfirm_password";
		}
		else if($comfirm_password != $password){
			$errors["comfirm_password"] = "*lracreq nuyn dzev";
		}	
		
		if(count($errors) > 0){
			print json_encode($errors);
		}

		else{
			$hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
			//print $hash;
			//var_dump(password_verify($_POST["password"], $hash));
			$this->db->query("INSERT INTO users (username,email,password) VALUES ('$username','$email','$hash')");
			print "SignIn successfull";
		}			
	}

	function logIn(){
		$errors = [];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$profile = $this->db->query("SELECT * FROM users WHERE email = '$email'")->fetch_all(true);		

		if(empty($email)){
			$errors["email"] = "*Write your email adress.";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 			$errors["email"] = "*Invalid email format";
		}
		if(isset($profile[0]["password"])){
			if(!password_verify($password, $profile[0]["password"])){
				$errors["password"] = "*Incorect Password";
			}
		}
		else{
			$errors["password"] = "*Incorect Password";
		}

		if(empty($password)){
			$errors["password"] = "*Write your password";
		}	

		if(count($errors) > 0){
			print json_encode($errors);
		}
		else{
			$_SESSION["user"] = $profile[0];
			print "LogIn successfull";
		}		
	}

	function logout(){
		session_destroy();
	}

	function addProducts(){
		$name = $_POST["productname"];
		$price = $_POST["price"];
		$photo = $_FILES["photo"];
		if(!file_exists("images")){
			mkdir("images");
		}
		$address="images/".time().$photo["name"];
		move_uploaded_file($photo["tmp_name"],$address);
		$this->db->query("INSERT INTO products (name, price, picture) VALUES ('$name', '$price', '$address') ");
		header("location: adminArea/addProducts/addproduct.php");		
	}

	function showProducts(){
		$product = $this->db->query("SELECT * FROM products")->fetch_all(true);
		print json_encode($product);
	}

	function removeProduct(){
		$productsId = $_POST["productsId"];
		$this->db->query("DELETE FROM products WHERE id = '$productsId' ");
	}

	function getEditProduct(){
		$productsId = $_POST["productsId"];
		$product = $this->db->query("SELECT * FROM products WHERE id = '$productsId' ")->fetch_all(true);
		$_SESSION["getEditProduct"] = $product[0];
		print json_encode($_SESSION["getEditProduct"]);
	}

	function edit(){
		$editName = $_POST["editName"];
		$editPrice = $_POST["editPrice"];
		$productId = $_POST["productId"];
		$product = $this->db -> query("SELECT * FROM products WHERE id = '$productId'")->fetch_all(true);
		$Id =  $product[0]["id"];
		$this->db->query("UPDATE products SET name = '$editName', price = '$editPrice' WHERE id = '$Id' ");
		$newProduct = $this->db -> query("SELECT * FROM users WHERE email = '$eEmail'")->fetch_all(true);
		$_SESSION["getEditProduct"] = $newProduct[0];		 
	}

	function addWorkers(){
		$workersName = $_POST["workersName"];
		$workersSurname = $_POST["workersSurname"];
		$workersSalary = $_POST["workersSalary"];
		$workersSpecialist = $_POST["workersSpecialist"];
		$photo = $_FILES["photo"];
		if(!file_exists("workersImg")){
			mkdir("workersImg");
		}
		$address="workersImg/".time().$photo["name"];
		move_uploaded_file($photo["tmp_name"],$address);
		$this->db->query("INSERT INTO workers (name, surname, salary, specialist, picture) VALUES ('$workersName', '$workersSurname', '$workersSalary', '$workersSpecialist', '$address') ");
		header("location: adminArea/workers/addWorkers/addworkers.php");				
	}

	function showWorkers(){
		$workers = $this->db->query("SELECT * FROM workers")->fetch_all(true);
		print json_encode($workers);
	}

	function removeWorkers(){
		$workersId = $_POST["workersId"];
		$this->db->query("DELETE FROM workers WHERE id = '$workersId'");
	}

	function addToCart(){
		$arr = [];
		$productId = $_POST["productId"];
		$userId = $_SESSION["user"]["id"];
		$productCount = $this->db->query("SELECT * FROM cart")->fetch_all(true);
		$count = count($productCount);
		$_SESSION["count"] = $count;
		$product = $this->db->query("SELECT * FROM cart WHERE user_id = '$userId' AND product_id = '$productId' ")->fetch_all(true);
		if(count($product) == 0){
			$this->db->query("INSERT INTO cart (user_id, product_id) VALUES ('$userId', '$productId') ");
			$count++;
			array_push($arr, "true", $count);
			print json_encode($arr);
		}
		else{
			array_push($arr, "false", $count);
			print json_encode($arr);
		}
	}

	function showProductsInCart(){
		$userId = $_SESSION["user"]["id"];
		$product = $this->db->query(" SELECT products.* from products JOIN  cart ON cart.product_id = products.id WHERE 
			cart.user_id = '$userId' ")->fetch_all(true);
		print json_encode($product);
	}

	function removeProductInFromCart(){
		$userId = $_SESSION["user"]["id"];
		$productId = $_POST["productId"];
		$this->db->query("DELETE FROM cart WHERE user_id = '$userId' AND product_id = '$productId' ");
	}

}


$k = new Shop();

?>
