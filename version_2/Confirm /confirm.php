
<?php
	include("../config.php");
	session_start();

	$booking_id = $_SESSION['fbooking_id'];
	$return_id = $_SESSION['rbooking_id'];
	$car_name = $_SESSION['car_name'];
	$dest_addr = $_SESSION['dest_addr'];
	$pickup_addr = $_SESSION['pickup_addr'];
	$pickup_time = $_SESSION['pickup_time'];
	$journey_type = $_SESSION['journey_type'];
	$return_time = $_SESSION['return_time'];

	$sql1 = "SELECT car_id ,price,distanceInfo.distance as dist FROM booked_for,taxiBooking,distanceInfo WHERE booked_for.booking_id = taxiBooking.booking_id and taxiBooking.pickup_addr=distanceInfo.location1 and taxiBooking.dest_addr=distanceInfo.location2 ";
			$result = mysqli_query($db,$sql1);

			$obj = mysqli_fetch_object($result);
			$car_id = $obj->car_id;
			$price = $obj->price;
			$distance =$obj->dist + $obj->dist;

	echo "<br/><br/>Car Name:&nbsp &nbsp ".$car_name."</br>Car Number: &nbsp &nbsp ".$car_id."<br/>Pickup Address: &nbsp &nbsp".$pickup_addr."<br/>Destination Address: &nbsp &nbsp".$dest_addr."<br/>Pickup Time: &nbsp &nbsp".$pickup_time."<br/>Price: &nbsp &nbsp".$price;

	if(strcmp($journey_type,"Single")!=0)
	{
		echo "<br/><br/>And Return Journey <br/><br/>Car Name:&nbsp &nbsp ".$car_name."</br>Car Number: &nbsp &nbsp ".$car_id."<br/>Pickup Address: &nbsp &nbsp".$dest_addr."<br/>Destination Address: &nbsp &nbsp".$pickup_addr."<br/>Pickup Time: &nbsp &nbsp".$return_time."<br/>Price: &nbsp &nbsp".$price;
	}

	$total=$price+$price;
	echo "<br/><br/><br/><br/><br/><br/>Distance: &nbsp".$distance."&nbsp Kms";
	echo "<br/><br/>Total Amount to be Paid: &nbsp  Rs.".$total;
	$_SESSION['price']=$total;
	$_SESSION['distance']=$distance;
?>



<html>
<head>
	<title>Your Booking Information :</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>
<body>

	<a id="contact-form" method="post" action="#" role="form">

	    <div class="messages"></div>

	    <?php echo "<div class='controls'>

	        <div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_name'> Car Name : </label>
	                    <input id='form_name' type='text' name='name' class='form-control'>
	                    <div class='help-block with-errors'> " .$car_name ."</div>
	                </div>
	            </div>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_lastname'> Car Number : </label>
	                    <input id='form_lastname' type='text' name='surname' class='form-control'>
	                    <div class='help-block with-errors'>" .$car_id ."</div>
	                </div>
	            </div>
	        </div>
	        <div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_email'> Pick up address : </label>
	                    <input id='form_email' type='email' name='email' class='form-control'>
	                    <div class='help-block with-errors'>" .$pickup_addr ."</div>
	                </div>
	            </div>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_phone'> Destination address : </label>
	                    <input id='form_phone' type='tel' name='phone' class='form-control'>
	                    <div class='help-block with-errors'>" .$dest_addr ."</div>
	                </div>
	            </div>
	        </div>
	        <div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_message'> Pickup Time : </label>
	                    <input id='form_message' name='message' class='form-control' ></input>
	                    <div class='help-block with-errors'>" .$pickup_time ."</div>
	                </div>
	            </div>
							<div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_phone'> Price : </label>
	                    <input id='form_phone' type='tel' name='phone' class='form-control'>
	                    <div class='help-block with-errors'> " .$price  ."</div>
	                </div>
	            </div>
				  </div>

					<div class = 'divider'> </div>

					<div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_name'> Car Name : </label>
	                    <input id='form_name' type='text' name='name' class='form-control'>
	                    <div class='help-block with-errors'> " .$car_name ."</div>
	                </div>
	            </div>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_lastname'> Car Number : </label>
	                    <input id='form_lastname' type='text' name='surname' class='form-control'>
	                    <div class='help-block with-errors'>" .$car_id ."</div>
	                </div>
	            </div>
	        </div>
	        <div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_email'> Pick up address : </label>
	                    <input id='form_email' type='email' name='email' class='form-control'>
	                    <div class='help-block with-errors'> " .$pickup_addr ."</div>
	                </div>
	            </div>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_phone'> Destination address : </label>
	                    <input id='form_phone' type='tel' name='phone' class='form-control'>
	                    <div class='help-block with-errors'> " .$dest_addr ." </div>
	                </div>
	            </div>
	        </div>
	        <div class='row'>
	            <div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_message'> Pickup Time : </label>
	                    <input id='form_message' name='message' class='form-control' ></input>
	                    <div class='help-block with-errors'> " .$pickup_time ."</div>
	                </div>
	            </div>
							<div class='col-md-6'>
	                <div class='form-group'>
	                    <label for='form_phone'> Price : </label>
	                    <input id='form_phone' type='tel' name='phone' class='form-control'>
	                    <div class='help-block with-errors'> " .$price ."</div>
	                </div>
	            </div>
	        </div>
					<!--
					<div class = 'divider'> </div>
					<div class = 'divider'> </div>
					<div class = 'divider'> </div>
				-->
					<div class='col-md-6'>
							<div class='form-group'>
									<label for='form_phone'> Distance : </label>
									<input id='form_phone' type='tel' name='phone' class='form-control'>
									<div class='help-block with-errors'>" .$distance ."</div>
							</div>
					</div>

					<div class='col-md-6'>
							<div class='form-group'>
									<label for='form_phone'> Total Amount to be Paid : </label>
									<input id='form_phone' type='tel' name='phone' class='form-control'>
									<div class='help-block with-errors'>" .$total ."</div>
							</div>
					</div>
					<div class='col-md-12'>
							<input type='submit' class='btn btn-success btn-send' value='Send message'>
					</div>
	    </div> ?>

	</a>




	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="validator.js"></script>
  <script src="contact.js"></script>

</body>
</html>
