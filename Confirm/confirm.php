<html>
<head>
	<title>Your Booking Information :</title>
</head>
<body>
	
	<?php
		include("../config.php");
		session_start();

		$booking_id = $_SESSION['fbooking_id'];
		$return_id = $_SESSION['rbooking_id'];
		$car_name = $_SESSION['car_name'];
		$dest_addr = $_SESSION['dest_addr'];
		$pickup_addr = $_SESSION['pickup_addr'];
		$pickup_time = $_SESSION['pickup_time'];
		$journey_type = $_SESSION['journey_type'];
		$return_time = $_SESSION['return_time'];

		$sql1 = "SELECT car_id ,price,distanceInfo.distance as dist FROM booked_for,taxiBooking,distanceInfo WHERE booked_for.booking_id = taxiBooking.booking_id and taxiBooking.pickup_addr=distanceInfo.location1 and taxiBooking.dest_addr=distanceInfo.location2 ";
      	$result = mysqli_query($db,$sql1);

      	$obj = mysqli_fetch_object($result);
      	$car_id = $obj->car_id;
      	$price = $obj->price;
      	$distance =$obj->dist + $obj->dist;

		echo "<br/><br/>Car Name:&nbsp &nbsp ".$car_name."</br>Car Number: &nbsp &nbsp ".$car_id."<br/>Pickup Address: &nbsp &nbsp".$pickup_addr."<br/>Destination Address: &nbsp &nbsp".$dest_addr."<br/>Pickup Time: &nbsp &nbsp".$pickup_time."<br/>Price: &nbsp &nbsp".$price;

		if(strcmp($journey_type,"Single")!=0)
		{
			echo "<br/><br/>And Return Journey <br/><br/>Car Name:&nbsp &nbsp ".$car_name."</br>Car Number: &nbsp &nbsp ".$car_id."<br/>Pickup Address: &nbsp &nbsp".$dest_addr."<br/>Destination Address: &nbsp &nbsp".$pickup_addr."<br/>Pickup Time: &nbsp &nbsp".$return_time."<br/>Price: &nbsp &nbsp".$price;
		}

		$total=$price+$price;
		echo "<br/><br/><br/><br/><br/><br/>Distance: &nbsp".$distance."&nbsp Kms";
		echo "<br/><br/>Total Amount to be Paid: &nbsp  Rs.".$total;
	?>

</body>
</html>