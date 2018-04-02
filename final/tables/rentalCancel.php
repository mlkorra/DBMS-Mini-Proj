<?php
	include("../config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$booking_id = $_POST['id'];

		echo $booking_id;
		$sql1 = "DELETE FROM rentalBooked_for WHERE rentalBooked_for.booking_id = '$booking_id'";
    	$result = mysqli_query($db,$sql1);

    	$sql1 = "DELETE FROM rentalBooking WHERE rentalBooking.booking_id = '$booking_id'";
    	$result = mysqli_query($db,$sql1);

    	header("location: cancel.php");

	}

?>
