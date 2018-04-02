<?php 
	include("../config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $name = $_POST['name'];
      $number = intval(mysqli_real_escape_string($db,$_POST['number']));
      $car_name    = mysqli_real_escape_string($db,$_POST['car_name']);

      $from_date = mysqli_real_escape_string($db,$_POST['from_date']);
      $array1 = explode("/",$from_date);
      $timestamp1 = $array1[2]."-".$array1[0]."-".$array1[1]." 06:00:00" ;


      $to_date = (mysqli_real_escape_string($db,$_POST['to_date'])); 
      $array2 = explode("/",$to_date);
      $timestamp2 =$array2[2]."-".$array2[0]."-".$array2[1]." 06:00:00" ;


      $diff = strtotime($timestamp2) - strtotime($timestamp1);
      $duration = round($diff / (60*60*24));


      $sql2 = "SELECT carInfo.rcharge_perday as cost from carInfo WHERE strcmp(carInfo.car_type,'Rental')=0 AND strcmp(carInfo.car_name, '$car_name')=0 LIMIT 1";
      $result =mysqli_query($db,$sql2);
      $obj2 = mysqli_fetch_object($result);

      $total = $duration * $obj2->cost ;
      $user_id = $_SESSION['login_user'];



      $sql1 = "INSERT INTO rentalBooking (user_id,traveller_name , traveller_no ,from_date,to_date,car_name, price) VALUES ('$user_id','$name',$number,'$timestamp1','$timestamp2','$car_name',$total)";
      $result = mysqli_query($db,$sql1);
      $_SESSION['rental_booking_id'] = mysqli_insert_id($db);
           
     $_SESSION['booking_status']="Booking has been done Successfully";
   
     $_SESSION['car_name'] = $car_name ;
     $_SESSION['from_date'] = $timestamp1 ;
     $_SESSION['to_date'] = $timestamp2;
     $_SESSION['rental_cost'] = $total ;
     $_SESSION['booking_type']="Rental";

     header("location: ../Pay/pay.php"); 
  	}

 ?>


<html>
<head>
<title>Booking Form Responsive Widget Template | Home :: w3layouts</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Booking Form  Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.12.0.min.js"></script>

<!--web-fonts-->
</head>
<body>
		<!---header--->
		<div class="header w3ls">
			<h1>Booking Form</h1>
		</div>
		<!---header--->
		<!---main--->
			<div class="main">
				<div class="main-section agile">
					<div class="login-form">
						<form action="" method="post">
							<ul>
								 <li class="text-info">Full Name *</li>
								 <li><input type="text" name="name" placeholder="" required></li>
								 <div class="clear"></div>
							 </ul>

							 <ul>
								 <li class="text-info">Phone Number *</li>
								 <li><input type="text" name="number" placeholder="" required></li>
								 <div class="clear"></div>
							 </ul>
							  <ul>
								<li class="text-info">From Date *</li>
								<li class="dat"><input class="date" name="from_date" id="datepicker" type="text" value="mm-dd-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm-dd-yyyy';}" required=></li>
								<div class="clear"></div>
							</ul>
							<ul>
								<li class="text-info">To Date *</li>
								<li class="dat"><input class="date" name="to_date" id="datepicker1" type="text" value="mm-dd-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm-dd-yyyy';}" required=></li>
								<div class="clear"></div>
							</ul>
							<!---start-date-piker---->
										<link rel="stylesheet" href="css/jquery-ui.css" />
										<script src="js/jquery-ui.js"></script>
											<script>
												$(function() {
												$( "#datepicker,#datepicker1" ).datepicker();
												});
											</script>
									<!---/End-date-piker---->


							 

							<ul>
								<li class="text-info">Car *</li>
								<li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="car_name">
									<option></option>
									<?php
										include("../config.php");
										$sql ="SELECT DISTINCT car_name FROM carInfo ";
										$result = mysqli_query($db,$sql);

										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											echo '<option value ="'.htmlspecialchars($row['car_name']).'">'.$row['car_name'].'</option>';
										}
									?>
									</select>
								</li>
								<div class="clear"></div>
							</ul>

							<ul>
								<li class="text-info">Additional Message :</li>
								<li><textarea></textarea></li>
								<div class="clear"></div>
							</ul>
							<input type="submit" value="Submit">
							<div class="clear"></div>
						</form>
					</div>
				</div>
			</div>

		<!---main--->
</body>
</html>