<?php
	include("../config.php");
	session_start();

	$booking_id =$_SESSION['rental_booking_id'];

	$sql = "SELECT traveller_name , traveller_no , car_name , from_date , to_date , price FROM rentalBooking WHERE rentalBooking.booking_id = '$booking_id'";
	$result = mysqli_query($db,$sql);

	$obj = mysqli_fetch_object($result);

	$traveller_name = $obj->traveller_name;
	$traveller_no = $obj->traveller_no;
	$car_name = $obj->car_name ;
	$from_date = $obj->from_date ;
	$to_date = $obj->to_date ;
	$price = $obj->price ;

	$sql = "SELECT rentalBooked_for.car_id from rentalBooked_for WHERE rentalBooked_for.booking_id = '$booking_id' ";
	$result = mysqli_query($db,$sql);

	$obj = mysqli_fetch_object($result);
	$car_id = $obj->car_id ;


	if($_SERVER["REQUEST_METHOD"] == "POST") {
		header("location: ../Index/home.php");  
	}
?>


<html lang="en">

<head>

<title>Confirmation Form </title>

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

		<h1>CONFIRMATION FORM</h1>

		<?php echo "
		<div class='containerw3layouts-agileits'>

			<h2>To reserve the cab ride, please complete and submit the booking form.</h2>

			<div class='w3layoutscontactagileits'>
				<form method='post'>

					<div class='w3lscartype agileinfow3ls'>
						<div class='w3lsjcartype-lable wthreelable'>
							<span class='aitscartype-lable'>
								<label>Passenger's</label>
								<label>Name</label>
							</span>
							<span class='colon'>:</span>
						</div>".$traveller_name."

						<div class='clear'></div>
					</div>

					<div class='w3lscartype agileinfow3ls'>
						<div class='w3lsjcartype-lable wthreelable'>
							<span class='aitscartype-lable'>
								<label>Phone</label>
								<label>No.</label>
							</span>
							<span class='colon'>:</span>
						</div>".$traveller_no."

						<div class='clear'></div>
					</div>


					<div class='w3lscartype agileinfow3ls'>
						<div class='w3lsjcartype-lable wthreelable'>
							<span class='aitscartype-lable'>
								<label>Car</label>
								<label>Name</label>
							</span>
							<span class='colon'>:</span>
						</div>".$car_name."

						<div class='clear'></div>
					</div>

					<div class='w3lscartype agileinfow3ls'>
						<div class='w3lsjcartype-lable wthreelable'>
							<span class='aitscartype-lable'>
								<label>Car</label>
								<label>Number</label>
							</span>
							<span class='colon'>:</span>
						</div>".$car_id."
						
						<div class='clear'></div>
					</div>
					<br/>

			

					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>From</label>
								<label>Date/Time</label>
							</span>
							<span class='colon'>:</span>
						</div>".$from_date."
					</div>

					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>To</label>
								<label>Date/Time</label>
							</span>
							<span class='colon'>:</span>
						</div>".$to_date."
					</div>

					<div class='w3lsjourneyaits agileinfow3ls'>
						<div class='w3lsjourneyaits-lable wthreelable'>
							<span class='aitsjourney-lable' text-align='centre'>
								<label>Total</label>
								<label>Amount</label>
								<label>Paid</label>
							</span>
							<span class='colon'>:</span>
						</div>".$price."
					</div>
					<br/><br/>


					<div class='aitssubmitw3ls'>
						<input name=='submit' type='submit' value='BACK TO HOME'>
					</div>

				</form>
			</div>

		</div>"
		?>

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
