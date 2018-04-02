<?php
   include("../config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['Name']);
      $mynumber = intval(mysqli_real_escape_string($db,$_POST['Number']));
      $myaddress = mysqli_real_escape_string($db,$_POST['DefaultPickup']);
      $myuserid = $_SESSION['login_user'];
      $mypass = $_POST['pass'];

      $sql = "SELECT custInfo.password as pass , custInfo.user_type as type from custInfo WHERE strcmp(custInfo.mail_id,'$myuserid')=0 ";
      $result = mysqli_query($db,$sql);

      $obj = mysqli_fetch_object($result);

      echo $obj->type;

      if(strcmp($obj->pass ,$mypass )==0)
      {
        $sql = "UPDATE  custInfo SET name = '$myusername' , phone_no = $mynumber , default_addr = '$myaddress' WHERE mail_id = '$myuserid'";
        $result1=mysqli_query($db,$sql);
  
        $_SESSION['status']="Details has been Updated Successfully";

        if(strcmp($obj->type , 'admin')==0)
        header("location: ../Index/adminHome.php");
    	else
        header("location: ../Index/home.php");
      }
      else{
			 echo "<div style='text-align:center'> <font color=brown size='5pt'>Incorrect Password</font> </div>";
      }
     }
?>

<html>
<head>
<title> Update Your Profile </title>
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
	<h2 class="sub-head">Your Details </h2>
		<div class="sub-main">
			<form action="" method="post">
        <?php
          include("../config.php");
          session_start();
          $user_id = $_SESSION['login_user'];

          $sql2="SELECT name , phone_no , default_addr , user_type as type FROM custInfo WHERE custInfo.mail_id = '$user_id' ";
          $result2=mysqli_query($db,$sql2);
          $obj = mysqli_fetch_object($result2);
    
			echo '<input placeholder=" Name" name="Name" class="name" type="text" value="'.$obj->name .'" required="">
				 	  <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				  <input placeholder="Phone Number" name="Number" class="number" type="text"  value="'.$obj->phone_no .'"  required="">
					 <span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
				  <input  placeholder="Address" name="DefaultPickup" class="pickup"  value="'.$obj->default_addr .'" type="text">
					 <span class="icon7"><i class="fa fa-addr" aria-hidden="true"></i></span><br>
           <input  placeholder="Password" name="pass" class="pass" type="password" required="">
           <span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>';
 
          echo '
       		 <input type="submit" value="Update">  
				</form>

      			<form action="password.php" method="post">
        		<input type="submit" value="Change Password">  
      			</form>';

      		if(strcmp($obj->type , 'admin')==0){

      			echo '<form action="../Index/adminHome.php" method="post">
      		 	 <input type="submit" value="Return to Home">  
      			</form>';
      		}
      		else
      		{
      			echo '<form action="../Index/home.php" method="post">
      			  <input type="submit" value="Return to Home">  
      			</form>';
      		}
      		?>
			</div>
			<div class="clear"></div>';
			
</div>
<!--//main-->

<!--footer
<div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!--//footer-->

</body>
</html>
