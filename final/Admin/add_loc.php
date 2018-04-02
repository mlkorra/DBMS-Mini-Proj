<?php
	include("../config.php");
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$sql2 ="SELECT DISTINCT location1 FROM distanceInfo ORDER BY location1";
		$result1 = mysqli_query($db,$sql2);

		$name = $_POST['name'];

		while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
		{

			$location = $row1["location1"];
			$distance = intval($_POST[$row1["location1"]]);


			$sql1 = "INSERT INTO distanceInfo (location1 , location2 , distance ) VALUES ( '$name','$location', $distance )";
    		$result = mysqli_query($db,$sql1);

    		$sql1 = "INSERT INTO distanceInfo (location1 , location2 , distance ) VALUES ( '$location', '$name' , $distance )";
    		$result = mysqli_query($db,$sql1);
    	
    	}
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
			<h1>Add New Location</h1>
		</div>

	<form action="" method="post">

	<div class="main">
			<div class="main-section agile">
				<div class="login-form">


		<ul>
			<li class="text-info">Location Name *</li>
			<li><input type="text" name="name" placeholder="" required></li>
			<div class="clear"></div>
		</ul>


	<br/><br/>

		<ul>
			<li class="text-info">Distances from :</li>
			<div class="clear"></div>
		</ul><br/><br/>

	<?php
		include("../config.php");
		session_start();

		$sql ="SELECT DISTINCT location1 FROM distanceInfo ORDER BY location1";
		$result = mysqli_query($db,$sql);
		$count = mysqli_num_rows($result);

		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		echo 
		'<ul>
			 <li class="text-info">'.htmlspecialchars($row['location1']).'*</li>
			 <li><input type="text" name='.htmlspecialchars($row['location1']).' placeholder=""></li>
			 <div class="clear"></div>
		 </ul>';
		}			
	?>
			<br/><br/>
			
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