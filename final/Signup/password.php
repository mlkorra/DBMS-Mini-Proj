<?php
   include("../config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

   	$password = $_POST["password"];
   	$new_password = $_POST['new_password'];
   	$old_password = $_POST['old_password'];

   	$user_id = $_SESSION['login_user'];

   	$sql = "SELECT custInfo.password as pass from custInfo WHERE strcmp(custInfo.mail_id,'$user_id')=0 ";
   	$result = mysqli_query($db,$sql);

   	$obj = mysqli_fetch_object($result);


   	if(strcmp($obj->pass, $old_password) == 0)
   	{
   		if(strcmp($new_password, $password) == 0)
   		{
   			$sql = "UPDATE custInfo SET password = '$new_password' WHERE custInfo.mail_id = '$user_id' ";
   			$result = mysqli_query($db,$sql);

   			header("location: update.php");
   		}
   		else
   			echo "New Passwords do not match";
   	}
   	else
   		echo "Old Password Incorrect";

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
<div class="main-agileits">
	<h2 class="sub-head">Change Your Password </h2>
		<div class="sub-main">
			<form action="" method="post">
				<input placeholder="New Password" name="password" class="password" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="New Password" name="new_password" class="new_password" type="password" required="">
					<span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
				<input placeholder="Old Password" name="old_password" class="old_password" type="password" required="">

       			 <input type="submit" value="Update">  
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