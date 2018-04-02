<?php
	session_start();
	echo "<div style='text-align:center'> <font color=green size='4pt'>".$_SESSION['status']."</font></div>";
?>

<html lang="en">
<head>
	<style>p.indent{ padding-left: 1.8em }</style>
	<title>Admin  Home </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-login100" title =" Book Cars Anywhere Anytime " style="background-image: url('images/taxi.jpg');">
		<!--<h1><strong> Car Booking Service</strong> </h1>-->
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="" method="post">
        <div class = "aligner">
          <h3> &nbsp &nbsp &nbsp Options available :  </h3>
          
        <div class = "divider"> </div>


        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Admin/add_car.php" class="button">Add a Cab</a>
				</div>
        <div class = "divider"> </div>

        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Admin/remove_car.php" class="button">Remove a Cab</a>
				</div>
        <div class = "divider"> </div>

        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Admin/add_loc.php" class="button">Add New Location</a>
				</div>
        <div class = "divider"> </div>

        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Admin/remove_loc.php" class="button">Delete a Location</a>
				</div>
        <div class = "divider"> </div>
        <div class = "divider"> </div>

        <div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Admin/Users/users.php" class="button">List all Users</a>
		</div>


      </div>

		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
