<html>
<body>


<?php
	include("../config.php");
	session_start();

	$fbooking_id = $_SESSION['fbooking_id'];
	$rbooking_id = $_SESSION['rental_booking_id'];
	$journey_type = $_SESSION['journey_type'];
	$booking_type = $_SESSION['booking_type'];

	if(strcmp($booking_type, "taxi")==0)
	{
		if(strcmp($journey_type,"Single")==0) 
		{
			$sql1 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);

    		$sql1 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    	}
    	else
    	{
    		$sql1 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    		$sql2 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$rbooking_id'";
    		$result = mysqli_query($db,$sql2);

    		$sql1 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$fbooking_id'";
    		$result = mysqli_query($db,$sql1);
    		$sql2 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$rbooking_id'";
    		$result = mysqli_query($db,$sql2);		
		}
		$_SESSION['status']="Booking has been cancelled";
		header("location: ../Index/home.php");
	}
	else {
		
		$sql1 = "DELETE FROM rentalBooked_for WHERE rentalBooked_for.booking_id = '$rbooking_id' ";
		$result = mysqli_query($db,$sql1);

    	$sql1 = "DELETE FROM rentalBooking WHERE rentalBooking.booking_id = '$rbooking_id'";
    	$result = mysqli_query($db,$sql1);

    	$_SESSION['status']="Booking has been cancelled";
		header("location: ../Index/home.php");
	}
?>

</body>
</html>
