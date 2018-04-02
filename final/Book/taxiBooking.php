<?php 
		include("../config.php");
		session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $name = $_POST['name'];
      $number = intval(mysqli_real_escape_string($db,$_POST['number']));
      $pickup_date = mysqli_real_escape_string($db,$_POST['pickup_date']);
      $pickup_hour = mysqli_real_escape_string($db,$_POST['pickup_hour']);
      $pickup_min =  mysqli_real_escape_string($db,$_POST['pickup_minute']);


      $array1 = explode("/",$pickup_date);

      $timestamp1 = $array1[2]."-".$array1[0]."-".$array1[1]." ".$pickup_hour.":".$pickup_min.":00" ;
      $pickup_addr = $_POST['pickup_addr'];


      $return_date = (mysqli_real_escape_string($db,$_POST['return_date'])); 
      $return_hour = mysqli_real_escape_string($db,$_POST['return_hour']);
      $return_min =  mysqli_real_escape_string($db,$_POST['return_minute']);

      $array2 = explode("/",$return_date);
      $timestamp2 =$array2[2]."-".$array2[0]."-".$array2[1]." ".$pickup_hour.":".$pickup_min.":00" ;

      $dest_addr = $_POST['dest_addr'];
      $car_name    = mysqli_real_escape_string($db,$_POST['car_name']);
      $journey_type= mysqli_real_escape_string($db,$_POST['journey']);


      $user_id = $_SESSION['login_user'];

      $sql1 = "INSERT INTO taxiBooking (user_id,traveller_name , traveller_no ,pickup_addr,pickup_time,dest_addr,car_name) VALUES ('$user_id','$name',$number,'$pickup_addr','$timestamp1','$dest_addr','$car_name')";
      $result = mysqli_query($db,$sql1);

      $_SESSION['fbooking_id'] = mysqli_insert_id($db);
      echo $_SESSION['fbooking_id'];

      if(strcmp($journey_type,"Single")!=0)
      {
      	$sql2 = "INSERT INTO taxiBooking (user_id,traveller_name , traveller_no ,pickup_addr,pickup_time,dest_addr,car_name) VALUES ('$user_id','$name',$number,'$dest_addr','$timestamp2','$pickup_addr','$car_name')";
     	 $result = mysqli_query($db,$sql2);

      	$_SESSION['rbooking_id'] = mysqli_insert_id($db);
      }


     if(strcmp($pickup_addr,$dest_addr)==0)
     {
     	$error = "Both Pickup address and Destination Address are the Same ";
         echo "<div style='text-align:center'> <font color=red size='4pt'>Both Pickup address and Destination Address are the Same </font> </div>";
     }
     
     else
     {
     	 $_SESSION['booking_status']="Booking has been done Successfully";

   	 	 $_SESSION['traveller_name']=$name;
   		 $_SESSION['traveller_no'] = $number ;
    	 $_SESSION['car_name'] = $car_name ;
    	 $_SESSION['dest_addr'] = $dest_addr;
    	 $_SESSION['pickup_addr'] = $pickup_addr;
    	 $_SESSION['pickup_time'] = $timestamp1 ;
    	 $_SESSION['journey_type'] = $journey_type;
    	 $_SESSION['return_time'] = $timestamp2;

    	 $_SESSION['booking_type']="taxi";
    	 header("location: ../Pay/pay.php"); 
 	}
  	}

 ?>


<html>
<head>
<title>Taxi Booking</title>
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
		<div class="header w3ls">
			<h1>Booking Form</h1>
		</div>
			<div class="main">
				<div class="main-section agile">
					<div class="login-form">
						<form action="#" method="post">
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
								<li class="text-info">Departure Date/Time *</li>
								<li class="dat"><input class="date" name="pickup_date" id="datepicker" type="text" value="mm-dd-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm-dd-yyyy';}" required=></li>
								<li class="selec"><select class="currentTime time-dropdown form-dropdown validate[required, limitDate]" id="hour_15" name="pickup_hour">
									<option> Hr </option>

									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>

								  </select>
								  <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="pickup_minute">
									<option>  Min</option>
									<option value="00"> 00 </option>
									<option value="10"> 10 </option>
									<option value="20"> 20 </option>
									<option value="30"> 30 </option>
									<option value="40"> 40 </option>
									<option value="50"> 50 </option>
								  </select>
								 </li>
								<div class="clear"></div>
							</ul>
							<ul>
								<li class="text-info">Return Date/Time *</li>
								<li class="dat"><input class="date" name="return_date" id="datepicker1" type="text" value="mm-dd-yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm-dd-yyyy';}" required=></li>
								<li class="selec"><select class="currentTime time-dropdown form-dropdown validate[required, limitDate]" id="hour_15" name="return_hour">
									<option> Hr </option>
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>

								  </select>
								  <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="return_minute">
									<option>  Min</option>
									<option value="00"> 00 </option>
									<option value="10"> 10 </option>
									<option value="20"> 20 </option>
									<option value="30"> 30 </option>
									<option value="40"> 40 </option>
									<option value="50"> 50 </option>
								  </select>
								  </li>
								<div class="clear"></div>
							</ul>
										<link rel="stylesheet" href="css/jquery-ui.css" />
										<script src="js/jquery-ui.js"></script>
											<script>
												$(function() {
												$( "#datepicker,#datepicker1" ).datepicker();
												});
											</script>


							 <ul>
								<li class="text-info">Pickup Address *</li>
								<li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="pickup_addr">
									<option></option>
									<?php
										include("../config.php");
										$sql ="SELECT DISTINCT location1 FROM distanceInfo ";
										$result = mysqli_query($db,$sql);

										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											echo '<option value ="'.htmlspecialchars($row['location1']).'">'.$row['location1'].'</option>';
										}
									?>
									</select>
								</li>
								<div class="clear"></div>
							</ul>
							 <ul>
								<li class="text-info">Destination Address *</li>
								<li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="dest_addr">
									<option></option>
									<?php
										include("../config.php");
										$sql ="SELECT DISTINCT location2 FROM distanceInfo ";
										$result = mysqli_query($db,$sql);

										while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											echo '<option value ="'.htmlspecialchars($row['location2']).'">'.$row['location2'].'</option>';
										}
									?>
									</select>
								</li>
								<div class="clear"></div>
							</ul>

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
								 <li class="text-info">Journey Type *</li>
								 <li class="se"><select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="journey_type">
									<option>  </option>
									<option value="Single">One-way</option>
									<option value="Two Way">Return</option>
								  </select></li>
								 <div class="clear"></div>
							 </ul>
							 <ul>
								 <li class="text-info">Number of Passengers *</li>
								 <li class="se"> <select class="time-dropdown form-dropdown validate[required, limitDate]" id="min_15" name="no_of_passengers">
									<option value="1"> 1 </option>
									<option value="2"> 2 </option>
									<option value="3"> 3 </option>
									<option value="4"> 4 </option>
									<option value="5"> 5 </option>
									<option value="6"> 6 </option>
									<option value="7"> 7 </option>
									<option value="8"> 8 </option>
									<option value="9"> 9 </option>
								  </select></li>
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