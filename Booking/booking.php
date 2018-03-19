<?php 
		include("../config.php");
		session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $pickup_date = (mysqli_real_escape_string($db,$_POST['pickup_date']));
      $pickup_hour = mysqli_real_escape_string($db,$_POST['pickup_hour']);
      $pickup_min =  mysqli_real_escape_string($db,$_POST['pickup_minute']);


      $array1 = explode("/",$pickup_date);

      $timestamp1 = $array1[2]."-".$array1[0]."-".$array1[1]." ".$pickup_hour.":".$pickup_min.":00" ;
      $pickup_addr = mysqli_real_escape_string($db,$_POST['pickuppoint']);


      $return_date = (mysqli_real_escape_string($db,$_POST['return_date'])); 
      $return_hour = mysqli_real_escape_string($db,$_POST['return_hour']);
      $return_min =  mysqli_real_escape_string($db,$_POST['return_minute']);

      $array2 = explode("/",$return_date);
      $timestamp2 =$array2[2]."-".$array2[0]."-".$array2[1]." ".$pickup_hour.":".$pickup_min.":00" ;

      $dest_addr = mysqli_real_escape_string($db,$_POST['destpoint']);
      $car_name    = mysqli_real_escape_string($db,$_POST['car_name']);
      $journey_type= mysqli_real_escape_string($db,$_POST['journey']);

      $user_id = $_SESSION['login_user'];

      $sql1 = "INSERT INTO taxiBooking (user_id,pickup_addr,pickup_time,dest_addr,car_name) VALUES ('$user_id','$pickup_addr','$timestamp1','$dest_addr','$car_name')";
      $result = mysqli_query($db,$sql1);

      $_SESSION['fbooking_id'] = mysqli_insert_id($db);


      if(strcmp($journey_type,"Single")!=0)
      {
      	$sql2 = "INSERT INTO taxiBooking (user_id,pickup_addr,pickup_time,dest_addr,car_name) VALUES ('$user_id','$dest_addr','$timestamp2','$pickup_addr','$car_name')";
     	 $result = mysqli_query($db,$sql2);
      }
      $_SESSION['rbooking_id'] = mysqli_insert_id($db);


     if(strcmp($pickup_addr,$dest_addr)==0)
     {
     	$error = "Both Pickup address and Destination Address are the Same ";
         echo "<div style='text-align:center'> <font color=red size='4pt'>Both Pickup address and Destination Address are the Same </font> </div>";
     }
     
     $_SESSION['booking_status']="Booking has been done Successfully";
   
     $_SESSION['car_name'] = $car_name ;
     $_SESSION['dest_addr'] = $dest_addr;
     $_SESSION['pickup_addr'] = $pickup_addr;
     $_SESSION['pickup_time'] = $timestamp1 ;
     $_SESSION['journey_type'] = $journey_type;
     $_SESSION['return_time'] = $timestamp2;


     header("location: ../Confirm/confirm.php");  
      
   	}
?>




<html lang="en">

<head>

<title>Car Booking Form </title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="Car Booking Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Meta-Tags -->

<!-- Custom-Style-Sheet -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
<!-- //Custom-Style-Sheet -->


<!-- Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" type="text/css" media="all">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700"			   type="text/css" media="all">
<!-- //Fonts -->

</head>
<!-- //Head -->



	<!-- Body -->
	<body>

		<h1>CAB BOOKING FORM</h1>

		<div class="containerw3layouts-agileits">

			<h2>To reserve the cab ride, please complete and submit the booking form.</h2>

			<div class="w3layoutscontactagileits">
				<form action="" method="post" >


					

					<div class="agileinfodeparture agileinfow3ls">
						<div class="agileinfodeparture-lable wthreelable">
							<span class="lable">
								<label>Departure</label>
								<label>Date/Time</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="agileinfodeparture-input wthreeinput">
							<input class="date agileits w3layouts" id="datepicker1" name="pickup_date" type="text" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="">
						</div>
						<div class="clear"></div>
					</div>

					<div class="agileinforeturn agileinfow3ls">
						<div class="agileinforeturn-lable wthreelable">
							<span class="aitsreturn-lable">
								<label>Return</label>
								<label>Date/Time</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="agileinforeturn-input wthreeinput">
							<input class="date agileits w3layouts" id="datepicker2" name="return_date" type="text" value="Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						</div>
						<div class="clear"></div>
					</div>


					<div class="aitspickupaddress agileinfow3ls">
						<div class="aitspickupaddress-lable wthreelable">
							<span class="agilepickup-lable">
								<label>Pickup</label>
								<label>Address</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="aitspickupaddress-input wthreeinput">
							<select name="pickuppoint">
								<option value="Kukatpally">Kukatpally</option>
								<option value="Cyberabad">Cyberabad</option>
								<option value="Golkonda Fort">Golkonda Fort</option>
								<option value="Charminar">Charminar</option>
								<option value="Hyderabad Airport">Hyderabad Airport</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>

					<div class="aitsdestinationaddress agileinfow3ls">
						<div class="aitsdestinationaddress-lable wthreelable">
							<span class="agiledest-lable">
								<label>Destination</label>
								<label>Address</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="aitsdestinationaddress-input wthreeinput">
							<select name="destpoint">
								<option value="Hyderabad Airport">Hyderabad Airport</option>
								<option value="Charminar">Charminar</option>								
								<option value="Golkonda Fort">Golkonda Fort</option>								
								<option value="Cyberabad">Cyberabad</option>
								<option value="Kukatpally">Kukatpally</option>								
							</select>
						</div>
						<div class="clear"></div>
					</div>

					<div class="w3lsjourneyaits agileinfow3ls">
						<div class="w3lsjourneyaits-lable wthreelable">
							<span class="aitsjourney-lable">
								<label>Journey</label>
								<label>Type</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="w3lsjourneyaits-input wthreeinput">
							<select name="journey">
								<option value="Single">Single</option>
								<option value="Two Way">Two Way</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>

					<div class="w3lscartype agileinfow3ls">
						<div class="w3lsjcartype-lable wthreelable">
							<span class="aitscartype-lable">
								<label>Car</label>
								<label>Type</label>
							</span>
							<span class="colon">:</span>
						</div>
						<div class="w3lscartypeaits-input wthreeinput">
							<select name="car_name">
								<option value="Maruti Swift">Maruti Swift</option>
								<option value="Maruti Omni">Maruti Omni</option>
								<option value="Mahindra Scorpio">Mahindra Scorpio</option>
								<option value="Hyundai Verna">Hyundai Verna</option>
								<option value="Honda City">Honda City</option>
							</select>
						</div>
						<div class="clear"></div>
					</div>

					<div class="aitssubmitw3ls">
						<input type="submit" name="submit" value="SUBMIT">
					</div>

					<div>
						<div >
							<label>Pickup Hour</label>
						</div>
						<div>
							<select name="pickup_hour">

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
						</div>
						<span class="clear">:</span>
					</div>

					<div>
						<div>
							<label>Pickup Minute</label>
						</div>
						
						<div>
							<select name="pickup_minute">
								<option value="00">00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>
						</div>
						<span class="clear">:</span>
					</div>


					div>
						<div >
							<label>Return Hour</label>
						</div>
						<div>
							<select name="return_hour">

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
						</div>
						<span class="clear">:</span>
					</div>

					<div>
						<div>
							<label>Return Minute</label>
						</div>
						
						<div>
							<select name="return_minute">
								<option value="00">00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>
						</div>
						<span class="clear">:</span>
					</div>

				</form>
			</div>

		</div>

		<div class="w3lsfooteragileits">
			<p> &copy; Cab Booking Form. All Rights Reserved <!--| Design by <a href="http://w3layouts.com" target="=_blank">W3layouts</a></p>-->
		</div>



		<!-- Necessary-JavaScript-Files-&-Links -->

			<!-- Default-JavaScript --> <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

			<!-- Date-Picker-JavaScript -->
				<script src="js/jquery-ui.js"></script>
				<script>
					$(function() {
						$( "#datepicker1,#datepicker2" ).datepicker();
					});
				</script>
			<!-- //Date-Picker-JavaScript -->

		<!-- //Necessary-JavaScript-Files-&-Links -->



	</body>
	<!-- //Body -->

</html>
