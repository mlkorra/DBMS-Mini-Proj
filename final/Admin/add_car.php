<?php
	
	include("../config.php");

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = $_POST["name"];
		$id = $_POST["id"];
		$cperkm = floatval($_POST["cperkm"]);
		$rperday = floatval($_POST["rperday"]);
		$persons = intval($_POST["persons"]);
		$type = $_POST["type"];

		$sql="INSERT INTO carInfo (car_name , car_id , car_type , charge_perkm , rcharge_perday , no_of_persons ) VALUES ('$name','$id', '$type' ,$cperkm,$rperday,$persons)";
		$result = mysqli_query($db,$sql);
	}

?>



<html>
<head>
<title>New Location Entry</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Booking Form  Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.12.0.min.js"></script>

<!--web-fonts-->
</head>
<body>
		<div class="header w3ls">
			<h1>Add New Car</h1>
		</div>

	
	<div class="main">
	<div class="main-section agile">
	<div class="login-form">

	<form action="" method="post">
		<ul>
			<li class="text-info">Car Name *</li>
			<li><input type="text" name="name" placeholder="" required></li>
			<div class="clear"></div>
		</ul>
		<br/><br/>

		<ul>
			<li class="text-info">Car Number:</li>
			<li><input type="text" name="id" placeholder="" required></li>
			<div class="clear"></div>
		</ul><br/><br/>

		<ul>
			<li class="text-info">Taxi charge per Km:</li>
			<li><input type="text" name="cperkm" placeholder="" required></li>
			<div class="clear"></div>
		</ul><br/><br/>

		<ul>
			<li class="text-info">Rental charge per Day:</li>
			<li><input type="text" name="rperday" placeholder="" required></li>
			<div class="clear"></div>
		</ul><br/><br/>

		<ul>
			<li class="text-info">Service Type:</li>
			<li class="se"> 
			<select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="type">
				<option> select </option>
				<option value="taxi">Taxi</option>
				<option value="Rental">Rental</option>
			</select>
			<div class="clear"></div>
		</ul><br/><br/>


		<ul>
			<li class="text-info">No of Persons:</li>
			<li><input type="text" name="persons" placeholder="" required></li>
			<div class="clear"></div>
		</ul><br/><br/>

			
		<input type="submit" value="Submit">
		<div class="clear"></div>
	</form>


	<form action="../Index/adminHome.php">
   		<input type="submit" value="Back to Home">
 		<div class="clear"></div>
	</form>
	</div></div></div>
			

</body>
</html>