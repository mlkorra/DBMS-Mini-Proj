<?php
	session_start();

	echo "<div style='text-align:center'> <font color=green size='4pt'>".$_SESSION['status']."</font></div>";
	$_SESSION['status']=" ";
?>

<html lang="en">
<head>
	<style>p.indent{ padding-left: 1.8em }</style>
	<title>Home Page </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

	<style type="text/css">
		.logoutLblPos{
 			  position:fixed;
			   right:10px;
			   top:5px;
			}
	</style>
</head>
<body>

	<div style="float:right">
<form align="right" name="form1" method="post" action="log_out.php">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>
</div>

	<div class="container-login100" title =" Book Cars Anywhere Anytime " style="background-image: url('images/taxi.jpg');">
		<!--<h1><strong> Car Booking Service</strong> </h1>-->
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-60">
			<form class="login100-form validate-form" action="" method="post">
        <div class = "aligner">
          <h3> &nbsp &nbsp &nbsp Options available :  </h3>

          <div class = "divider"> </div><div class = "divider"> </div><div class = "divider"> </div>
        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Book/taxiBooking.php" class="button">Book Taxi</a>
				</div>

        <div class = "divider"> </div>
				<div class="container-login100-form-btn">
					<a class="login100-form-btn" href="../Book/rentalBooking.php" class="button">Book Rental</a>
				</div>
        <div class = "divider"> </div>

		<div class="container-login100-form-btn">
				<a class="login100-form-btn" href="../tables/cancel.php" class="button">Cancel Booking</a>
		</div>
        <div class = "divider"> </div>


		 <div class="container-login100-form-btn">
				<a class="login100-form-btn" href="../tables/history.php" class="button">Transaction History</a>
		</div>
        <div class = "divider"> </div>

		<div class="container-login100-form-btn">
				<a class="login100-form-btn" href="../Signup/update.php" class="button">Update Profile</a>
		</div>

      </div>

		</div>
	</div>



	<div id="dropDownSelect1"></div>

</body>
</html>
