<html>
<body>


<?php
	include("../config.php");
	session_start();

	$fbooking_id = $_SESSION['fbooking_id'];
	$rbooking_id = $_SESSION['rbooking_id'];
	$journey_type = $_SESSION['journey_type'];
	$booking_type = $_SESSION['booking_type'];

	if(strcmp($booking_type, "Taxi")==0)
	{
		echo $fbooking_id;
		if(strcmp($journey_type,"Single")==0) 
		{
			echo $fbooking_id;
			$sql1 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);

    		$sql1 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    	}
    	else
    	{
    		echo $booking_type;
    		$sql1 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    		$sql2 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$rbooking_id'";
    		$result = mysqli_query($db,$sql2);

    		$sql1 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    		$sql2 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$rbooking_id'";
    		$result = mysqli_query($db,$sql2);		
		}
		$_SESSION['booking_status']="Booking has been cancelled";
		header("location: ../Home/home.php");
	}
	else {
		$booking_id = $rbooking_id ;
	}
?>

</body>
</html>
