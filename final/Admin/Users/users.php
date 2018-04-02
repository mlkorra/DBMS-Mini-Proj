<html>
<head>
	<style>p.indent{ padding-left: 1.8em }</style>
	<title>List Of Users </title>
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
			/**background-image: url('<?php //echo "car1.jpg"?>');*/
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
			color: #353535;
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
	<h1>List of Users</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>user_type</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("../../config.php");
	session_start();

	$sql ="SELECT name , mail_id , password , phone_no , default_addr , user_type FROM custInfo ORDER BY name";
	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);

	if($count >0) { 
		$no = 1;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['mail_id'].'</td>
					<td>'.$row['phone_no'].'</td>
					<td>'.$row['default_addr']. '</td>
					<td>'.$row['user_type'].'</td>
				</tr>';
				$no++;
		}
		echo '</table>';
	}
	else {
		echo "<div style='text-align:center'> <font color=blue size='5pt'>No Users Registered</div>";
	}
?>


	<div class="container-login100-form-btn">
			<h1><a class="login100-form-btn" href="../../Index/adminHome.php" class="button">Return to Admin Home </a></h1>
	</div>

</body>
</html>
