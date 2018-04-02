<?php
	include("../config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {

			$location = $_POST["location"];

			$sql1 = "DELETE FROM distanceInfo WHERE strcmp(location1,'$location')=0 OR strcmp(location2,'$location')=0";
    		$result = mysqli_query($db,$sql1);    	
    	}

?>


<html>
<head>
<title>Locations Remove</title>
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
		<h1>Locations Removal Form</h1>
	</div>

	<div class="main">
		<div class="main-section agile">
		<div class="login-form">
		<form action="#" method="post">
		<ul>
		<li class="text-info">Select Location to Remove :  </li>
		 <li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="location">
			<option> select </option>
	

	<?php
		include("../config.php");
		session_start();

		$sql ="SELECT DISTINCT location1 FROM distanceInfo ORDER BY location1";
		$result = mysqli_query($db,$sql);
		$count = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<option value='.htmlspecialchars($row['location1']).'>'.htmlspecialchars($row['location1']).'</option>';
		}			
	?>

	
			</select>
			 <div class="clear"></div>
			 </ul>
			<br/><br/><br/><br/><br/><br/><br/>
			
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