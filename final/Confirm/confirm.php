<?php
	include("../config.php");
	session_start();

	$traveller_name = $_SESSION['traveller_name'];
	$traveller_no = $_SESSION['traveller_no'];
	$car_name = $_SESSION['car_name'];
	$car_id = $_SESSION['car_id'];
	$pickup_addr = $_SESSION['pickup_addr'];
	$dest_addr = $_SESSION['dest_addr'];
	$pickup_time = $_SESSION['pickup_time'];
	$price = $_SESSION['price'];

	$journey_type=$_SESSION['journey_type'];

	if(strcmp($journey_type, "Single")!=0)
	{
		$distance = $_SESSION['distance']/2;
		$return_time = $_SESSION['return_time'];
	}
	else{
		$distance = $_SESSION['distance'];
	}

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
					<br/><br/><br/>

					".($journey_type != 'Single' ?"
					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>Journey</label>
								<label>1</label>
							</span>
						</div>
					</div>
					":"")."


					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>Pick Up</label>
								<label>Date/Time</label>
							</span>
							<span class='colon'>:</span>
						</div>".$pickup_time."
					</div>

					<div class='aitspickupaddress agileinfow3ls'>
						<div class='aitspickupaddress-lable wthreelable'>
							<span class='agilepickup-lable'>
								<label>Pickup</label>
								<label>Address</label>
							</span>
							<span class='colon'>:</span>
						</div>".$pickup_addr."
					</div>

					<div class='aitsdestinationaddress agileinfow3ls'>
						<div class='aitsdestinationaddress-lable wthreelable'>
							<span class='agiledest-lable'>
								<label>Destination</label>
								<label>Address</label>
							</span>
							<span class='colon'>:</span>
						</div>".$dest_addr."
					</div>

					<div class='w3lsjourneyaits agileinfow3ls'>
						<div class='w3lsjourneyaits-lable wthreelable'>
							<span class='aitsjourney-lable'>
								<label>Distance</label>
							</span>
							<span class='colon'>:</span>
						</div>".$distance."	
					</div>

					".($journey_type != 'Single' ?"
					<br/><br/><br/><br/>
					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>Journey</label>
								<label>2</label>
							</span>
						</div>
					</div>


					<div class='agileinforeturn agileinfow3ls'>
						<div class='agileinforeturn-lable wthreelable'>
							<span class='aitsreturn-lable'>
								<label>Return</label>
								<label>Date/Time</label>
							</span>
							<span class='colon'>:</span>
						</div>".$return_time."
					</div>


					<div class='aitspickupaddress agileinfow3ls'>
						<div class='aitspickupaddress-lable wthreelable'>
							<span class='agilepickup-lable'>
								<label>Pickup</label>
								<label>Address</label>
							</span>
							<span class='colon'>:</span>
						</div>".$dest_addr."
					</div>

					<div class='aitsdestinationaddress agileinfow3ls'>
						<div class='aitsdestinationaddress-lable wthreelable'>
							<span class='agiledest-lable'>
								<label>Destination</label>
								<label>Address</label>
							</span>
							<span class='colon'>:</span>
						</div>".$pickup_addr."
					</div>

					<div class='w3lsjourneyaits agileinfow3ls'>
						<div class='w3lsjourneyaits-lable wthreelable'>
							<span class='aitsjourney-lable'>
								<label>Distance</label>
							</span>
							<span class='colon'>:</span>
						</div>".$distance."
					</div>
					":"")."

					<br/><br/><br/><br/>
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
					<br/><br/><br/>


					<div class='aitssubmitw3ls'>
						<input name=='submit' type='submit' value='BACK TO HOME'>
					</div>

				</form>
			</div>

		</div>"
		?>

		<div class="w3lsfooteragileits">
			<p> &copy; Cab Booking Form. All Rights Reserved 		</div>



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
