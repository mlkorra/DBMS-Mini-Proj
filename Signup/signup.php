<?php
   include("../config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myuserid = mysqli_real_escape_string($db,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      $myusername = mysqli_real_escape_string($db,$_POST['Name']);
      $mynumber = (int)mysqli_real_escape_string($db,$_POST['Number']);
      $myaddress = mysqli_real_escape_string($db,$_POST['DefaultPickup']);

      if(!filter_var($myuserid, FILTER_VALIDATE_EMAIL)){
      	$emailErr="Invalid email address";
      	echo "<div style='text-align:center'> <font color=red size='4pt'>Invalid Email Address </font> </div>";
      }
      else{
      
      $sql = "SELECT mail_id FROM custInfo WHERE mail_id = '$myuserid' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 0) {
        //session_register("myusername");
        $sql = "INSERT INTO custInfo (mail_id,password,name,phone_no,default_addr) VALUES ('$myuserid','$mypassword','$myusername',$mynumber,'$myaddress')";
        if(mysqli_query($db,$sql)==TRUE) {
        	$_SESSION['signup_status']="Signup has been Successfully Completed";
        	 header("location: ../Login/login.php");
     	}else{
			echo  "<div style='text-align:center'> <font color=red size='3pt'>An error has occurred  while adding user to database</font> </div>";
     	}
      }else {
         $error = "User has already been registered on this email Id";
         echo "<div align='centre'> <font color=red size='3pt'>User has already been registered on this email Id</font> </div>";
      }
     }
   }
?>

<html>
<head>
<title> Sign Up to Car Booking </title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" Sign Up Form " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header
	<div class="header-w3l">
		<h1> Sign up to be a Registered User </h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	<h2 class="sub-head">Fill the form to Register </h2>
		<div class="sub-main">
			<form action="" method="post">
				<input placeholder=" Name" name="Name" class="name" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="Phone Number" name="Number" class="number" type="text" required="">
					<span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
				<input placeholder="Email" name="mail" class="mail" type="text" required="">
					<span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
				<input  placeholder="Password" name="pass" class="pass" type="password" required="">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				<input  placeholder="Confirm Password" name="pass" class="pass" type="password" required="">
					<span class="icon6"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				<input  placeholder="Address" name="DefaultPickup" class="pickup" type="text">
					<span class="icon7"><i class="fa fa-addr" aria-hidden="true"></i></span><br>

				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
</div>
<!--//main-->

<!--footer
<div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!--//footer-->

</body>
</html>
