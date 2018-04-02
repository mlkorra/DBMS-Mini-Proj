<?php
	include("../config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$booking_id = $_POST['id'];

		echo $booking_id;
		$sql1 = "DELETE FROM booked_for WHERE booked_for.booking_id = '$booking_id'";
    	$result = mysqli_query($db,$sql1);

    	$sql1 = "DELETE FROM taxiBooking WHERE taxiBooking.booking_id = '$booking_id'";
    	$result = mysqli_query($db,$sql1);

	}

?>


<html>
<head>
	<style>p.indent{ padding-left: 1.8em }</style>
	<title>Welcome to Car Booking </title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin-top: 35px;
    		margin-bottom: 45px;
    		margin-right: 125px;
    		margin-left: 120px;
			text-align: center;
			font-size: 25px;
			color:#008000;
		}
		h2 {
			margin-top: 45px;
    		margin-bottom: 300px;
			text-align: center;
			font-size: 25px;
			color:#008000;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 1600px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
			font-size: 30px;
			background-color: #FFFFFF;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
			text-align: center;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>

<body>
	<h1>Active Taxi Bookings</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Passenger's Name</th>
				<th>Phone Number</th>
				<th>Car Name</th>
				<th>Pick up</th>
				<th>Destination</th>
				<th>Price</th>
				<th>Date of Journey</th>
				<th>Date of Booking</th>
				<th>Cancel Booking</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("../config.php");
	session_start();

	$user_id = $_SESSION['login_user'];

	$sql ="SELECT booking_id , traveller_name , traveller_no , car_name , pickup_addr , dest_addr , price , pickup_time , time_of_booking FROM taxiBooking WHERE user_id = '$user_id' AND pickup_time > NOW() + INTERVAL 3 HOUR";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) { 
		$no = 1;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['traveller_name'].'</td>
					<td>'.$row['traveller_no'].'</td>
					<td>'.$row['car_name'].'</td>
					<td>'.$row['pickup_addr'].'</td>
					<td>'.$row['dest_addr'].'</td>
					<td>'.$row['price'].'</td>
					<td>'. date('F d, Y', strtotime($row['pickup_time'])) . '</td>
					<td>'.date('F d, Y', strtotime($row['time_of_booking']))."</td>
					
					<td> 
						<form action='' method='post'>
						<input type='hidden' name='id' value=".$row["booking_id"].">
						<input type='submit' name='submit' value=' Cancel '>
						</form>
					</td>
				</tr>";
				$no++;
		}
		echo '</table>';
	}
	else {
		echo '</table>';
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No precious Transactions</div>";
	}
?>


	<br/><br/><br/><br/>


	<h1>Active Rental Bookings</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Passenger's Name</th>
				<th>Phone Number</th>
				<th>Car Name</th>
				<th>Price</th>
				<th>Rental From</th>
				<th>Rental To</th>
				<th>Date of Booking</th>
				<th>Cancel Booking</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("../config.php");
	session_start();

	$user_id = $_SESSION['login_user'];

	$sql ="SELECT booking_id , traveller_name , traveller_no , car_name , price , from_date , to_date , time_of_booking FROM rentalBooking WHERE user_id = '$user_id' AND from_date > NOW()";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) { 
		$no = 1;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['traveller_name'].'</td>
					<td>'.$row['traveller_no'].'</td>
					<td>'.$row['car_name'].'</td>
					<td>'.$row['price'].'</td>
					<td>'. date('F d, Y', strtotime($row['from_date'])) . '</td>
					<td>'. date('F d, Y', strtotime($row['to_date'])) . '</td>
					<td>'.date('F d, Y', strtotime($row['time_of_booking']))."</td>
					
					<td> 
						<form action='rentalCancel.php' method='post'>
						<input type='hidden' name='id' value=".$row["booking_id"].">
						<input type='submit' name='submit' value=' Cancel '>
						</form>
					</td>
				</tr>";
				$no++;
		}
		echo '</table>';
	}
	else {
		echo '</table>';
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No precious Transactions</div>";
		//<h2><a class="login100-form-btn" href="../homepages/home.php" class="button">Return to Home Page</a></h2>
	}
?>


	<div class="container-login100-form-btn">
			<h2><a class="login100-form-btn" href="../Index/home.php" class="button">Return to Home Page</a></h2>
	</div>

</body>
</html>
