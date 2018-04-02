

<?php
    session_start();
    $_SESSION['index'] = 1;
    echo "<div style='text-align:center'> <font color=green size='4pt'>".$_SESSION['status']."</font></div>";
?>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license.
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> CityCabs - A Cab booking service for a perfect city </title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span>
                	City Cabs
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <!--<li>
                        <a href="#">Products</a>
                    </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
						<ul class="dropdown-menu" aria-labelledby="about-us">
							<li><a href="#">Engage</a></li>
							<li><a href="#">Pontificate</a></li>
							<li><a href="#">Synergize</a></li>
						</ul>
					</li>-->
                    <li>
                        <a href="../homepages/login.php">Sign Out</a>
                    </li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Intro Section -->
     <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                </div>
            </div>
        </div>
    </section>

    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                	<!--<span class="glyphicon glyphicon-apple" style="font-size: 60px"></span>-->
                    <h2 class="section-heading">Providing effective cab and taxi booking services </h2>
                    <p class="text-light">Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                </div>
            </div>
        </div>
    </section>



	
	<div class="container-fluid">
        <div class="row promo">
        	<a href="../Admin/add_car.php">
				<div class="col-md-4 promo-item item-1">
					<h3>
						Add New Cab
					</h3>
				</div>
            </a>
            <a href="../Admin/remove_car.php">
				<div class="col-md-4 promo-item item-2">
					<h3>
						Remove Cab
					</h3>
				</div>
            </a>

			<a href="../Admin/Users/users.php">
				<div class="col-md-4 promo-item item-3">
					<h3>
						Users List
					</h3>
				</div>
            </a>
        </div>
    </div><!-- /.container-fluid -->

    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 class="section-heading">-----Select Options ----- </h2>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row promo">
            <a href="../Admin/add_loc.php">
                <div class="col-md-4 promo-item item-3">
                    <h3>
                        New Location
                    </h3>
                </div>
            </a>
            <a href="../Admin/remove_loc.php">
                <div class="col-md-4 promo-item item-1">
                    <h3>
                        Remove Location
                    </h3>
                </div>
            </a>

            <a href="../Signup/update.php">
                <div class="col-md-4 promo-item item-2">
                    <h3>
                        Update Profile
                    </h3>
                </div>
            </a>

        </div>
    </div><!-- /.container-fluid -->

    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    
                </div>
            </div>
        </div>
    </section>

	<!-- Content 3
     <section class="content content-3">
        <div class="container">
			<h2 class="section-header"><span class="glyphicon glyphicon-pushpin text-primary"></span><br> Sanity Check</h2>
			<p class="lead text-muted">Holisticly predominate extensible testing procedures for reliable supply chains. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                    <a href="#" class="btn btn-primary btn-lg">Check Now</a>
            </div>
        </div>
    </section>

	<!-- Footer -->
    <footer class="page-footer">

        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<p>Copyright &copy; Krishna Maithreya | Rahul Dev | Debajyoti Halder </p>
            <p> Database Management Systems Project </p>
        	</div>
        </div>

    </footer>

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>

</body>

</html>
