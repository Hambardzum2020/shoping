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
    <!-- Favicon -->
   <!--  <link href="img/favicon.ico" rel="shortcut icon"/> -->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="../../../css/animate.css"/>
    <link rel="stylesheet" href="../../../css/style.css"/>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">Add workers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../admin.php">Home</a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="../workers.php">Workers</a>
                </li>  
                <li class="nav-item active">
                    <a class="nav-link" href="#">Add workers</a>
                </li>                                                                           
            </ul>

        </div>
    </div>
</nav>
<br><br>


<div class="wrapper fadeInDown">
  <div id="formContent">

    <form action="../../../server.php" method="post" enctype="multipart/form-data">
      <input type="text" id="workersName" class="fadeIn second" name="workersName" placeholder="Workers Name">
      <input type="text" id="workersSurname" class="fadeIn second" name="workersSurname" placeholder="Workers Surname">
      <input type="text" id="workersSalary" class="fadeIn second" name="workersSalary" placeholder="Workers Salary">
      <input type="text" id="workersSpecialist" class="fadeIn second" name="workersSpecialist" placeholder="workersSpecialist">
      <input type="file" accept="image/*" name="photo" id="input-username" class="fadeIn third">
      <input type="submit" class="fadeIn fourth" id="addproduct" name="addWorkers">
    </form>


    <div id="formFooter">
      <a class="underlineHover" href="../SignIn/signIn.php">Delete Product</a>
    </div>

  </div>
</div>



</body>
</html>