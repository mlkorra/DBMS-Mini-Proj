<?php
	include("../config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$car_id = $_POST['id'];

		$sql1 = "SELECT car_id FROM booked_for WHERE booked_for.car_id = '$car_id'";
    	$result = mysqli_query($db,$sql1);
    	$count1 = mysqli_num_rows($result);

    	$sql1 = "SELECT car_id FROM rentalBooked_for WHERE rentalBooked_for.car_id = '$car_id'";
    	$result = mysqli_query($db,$sql1);
    	$count2 = mysqli_num_rows($result);

    	$sum = $count1 + $count2 ;


    	if($sum == 0)
    	{
			$sql1 = "DELETE FROM carInfo WHERE carInfo.car_id = '$car_id'";
    		$result = mysqli_query($db,$sql1);
    	}
    	else
    		echo "An Active Booking Exists on the selected Car";
	}

?>


<html>
<head>
	<style>p.indent{ padding-left: 1.8em }</style>
	<title>Welcome to Car Booking </title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

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
			min-width: 1200px;
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
	<h1>Taxi Cars</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Car Name</th>
				<th>Car No</th>
				<th>Charge per Km</th>
				<th>Price</th>
				<th>Remove Car</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("../config.php");
	session_start();

	$user_id = $_SESSION['login_user'];

	$sql ="SELECT car_name , car_id , car_type , charge_perkm , rcharge_perday  , cost  FROM carInfo WHERE car_type = 'taxi' ORDER BY car_name ASC";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) { 
		$no = 1;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['car_name'].'</td>
					<td>'.$row['car_id'].'</td>
					<td>'.$row['charge_perkm'].'</td>
					<td>'.$row['cost']."</td>
					<td> 
						<form action='' method='post'>
						<input type='hidden' name='id' value=".$row["car_id"].">
						<input type='submit' name='remove' value=' Remove '>
						</form>
					</td>
				</tr>";
				$no++;
		}
		echo '</table>';
	}
	else {
		echo '</table>';
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No Cars Present</div>";
	}
?>

	<br/><br/><br/><br/>

	<h1>Rental Cars</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Car Name</th>
				<th>Car No</th>
				<th>Rental Charge per Day</th>
				<th>Price</th>
				<th>Remove Car</th>
			</tr>
		</thead>
		<tbody>

<?php
	include("../config.php");
	session_start();

	$user_id = $_SESSION['login_user'];

	$sql ="SELECT car_name , car_id , car_type , charge_perkm , rcharge_perday  , cost  FROM carInfo WHERE car_type = 'Rental'  ORDER BY  car_name ASC";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) { 
		$no = 1;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['car_name'].'</td>
					<td>'.$row['car_id'].'</td>
					<td>'.$row['rcharge_perday'].'</td>
					<td>'.$row['cost']."</td>
					<td> 
						<form action='' method='post'>
						<input type='hidden' name='id' value=".$row["car_id"].">
						<input type='submit' name='remove' value=' Remove '>
						</form>
					</td>
				</tr>";
				$no++;
		}
		echo '</table>';
	}
	else {
		echo '</table>';
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No Cars Present</div>";
	}
?>


	<div class="container-login100-form-btn">
			<h2><a class="login100-form-btn" href="../Index/adminHome.php" class="button">Return to Home Page</a></h2>
	</div>

</body>
</html>
