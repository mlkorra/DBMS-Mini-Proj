<html>
<head>
	

	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
			background-image: url('<?php echo "car1.jpg"?>');
			background-repeat:no-repeat;
			background-size:cover;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 25px;
			color:#3A393B;;
		}

		h2 {
			margin: 17px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 25px;
			color:#060606;;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
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
			color: #322828;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
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
	<h1>Car Fares</h1>
	<br/><br/><br/>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name of the Car</th>
				<th>Taxi Charge per Km</th>
				<th>Rental Charge per Day</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("../config.php");

	$sql1 ="SELECT DISTINCT car_name FROM carInfo ORDER BY car_name";
	$result1 = mysqli_query($db,$sql1);
	$count = mysqli_num_rows($result1);

	if($count >0) { 
		$no = 1;
		while($obj1 = mysqli_fetch_object($result1)){
			$sql2 ="SELECT charge_perkm , rcharge_perday FROM carInfo WHERE car_name = '$obj1->car_name' LIMIT 1 ";
			$result2 = mysqli_query($db,$sql2);
			$obj2 = mysqli_fetch_object($result2);

			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$obj1->car_name.'</td>
					<td>'.$obj2->charge_perkm.'</td>
					<td>'.$obj2->rcharge_perday.'</td>
				</tr>';
				$no++;
		}
		echo '</table>';
	}
	else {
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No Cars are Found</div>";
	}
?>


	<div class="container-login100-form-btn">
			<br/><br/><br/>
			<a class="login100-form-btn" href="../Home/home.php" class="button"> <h2>Return to Home Page</h2></a>
	</div>

</body>
</html>
