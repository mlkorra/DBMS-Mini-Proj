<html>
<body>

<?php
	include("config.php");
	session_start();

	$user_id = $_SESSION['login_user'];
	$sql ="SELECT pickup_addr , dest_addr , price , pickup_time , date_of_booking WHERE user_id = '$user_id'";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) {
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo "<br> car_name: ".$row['car_name']."     pickup_addr: ".$row['pickup_addr']."    dest_addr: ".$row['dest_addr']."    pickup_time: ".$row['pickup_time']."    booking date: ".$row['date_of_booking']."<br>";
		}
	}
	else echo "No precious Transactions";
?>


			<a href="../Home/home.php"> Return to Home Page </a>

</body>
</html>
