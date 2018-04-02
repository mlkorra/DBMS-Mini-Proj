<?php
	include("../config.php");
	session_start();

	$tbooking_id = $_SESSION['fbooking_id'];
	$rbooking_id = $_SESSION['rbooking_id'];
	$rental_booking_id = $_SESSION['rental_booking_id'];
	$journey_type = $_SESSION['journey_type'];
	$booking_type = $_SESSION['booking_type'];
	if(strcmp($booking_type,"Taxi")==0) 
	{

		$dest_addr = $_SESSION['dest_addr'];
		$pickup_addr = $_SESSION['pickup_addr'];

		$sql1 = "SELECT booked_for.car_id as cid,taxiBooking.price as cost,distanceInfo.distance as dist FROM booked_for,taxiBooking,distanceInfo WHERE booked_for.booking_id = '$tbooking_id' AND taxiBooking.booking_id = '$tbooking_id' AND distanceInfo.location1 = '$pickup_addr' AND distanceInfo.location2 = '$dest_addr' ";
    	$result1 = mysqli_query($db,$sql1);

    	$sql2 = "SELECT booked_for.car_id as cid,taxiBooking.price as cost,distanceInfo.distance as dist FROM booked_for,taxiBooking,distanceInfo WHERE booked_for.booking_id = '$rbooking_id' AND taxiBooking.booking_id = '$rbooking_id' AND distanceInfo.location1 = '$pickup_addr' AND distanceInfo.location2 = '$dest_addr' ";
    	$result2 = mysqli_query($db,$sql2);


   		$obj1 = mysqli_fetch_object($result1);
   		$car_id = $obj1->cid;

    	$obj2 = mysqli_fetch_object($result2);
   		$car_id = $obj2->cid;

    	if($journey_type!="Single"){
    		$total=$obj1->cost+$obj2->cost;
    		$distance =$obj1->dist + $obj2->dist;
		}
		else{
			$total = $obj1->cost ;
			$distance =$obj1->dist;
		}
    	echo $booking_id,$tbooking_id,$rbooking_id,$total,$car_id;
    	$_SESSION['car_id']=$car_id;
    	$_SESSION['price']=$total;
		$_SESSION['distance']=$distance;

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			header("location: ../Confirm/confirm.php");  
		}
	}

	else {

		$from_date = $_SESSION['from_date'];
		$to_date = $_SESSION['to_date'];
		$total = $_SESSION['rental_cost'];

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			header("location: ../Confirm/rentalConfirm.php");  
		}

	}
?>


<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title> Confirm your Booking </title>
</head>
<body>
<header>
	</h1><?php echo "<h1> Amount needed to pay : ".$total."</h1>"?>
</header>

<a href="#0" class="cd-popup-trigger">Book</a>

<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p> Confirm Booking </p>
		<ul class="cd-buttons">
			<li><a><form action="" method="post"><input type="submit" value="Yes"></form></a></li>
			<li><a href="#0">No</a></li>
		</ul> 
		<a href="#0" class="cd-popup-close img-replace">Close</a>
	</div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<a href="cancel.php" class="cd-popup-cancel"> Cancel </a>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
