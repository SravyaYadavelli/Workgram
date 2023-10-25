<?php @ob_start();
if(!isset($_SESSION))
session_start();
if($_SESSION['username'] == null || $_SESSION['user_type'] == null)
{
	header ("Location:login.php");
}
$username = $_SESSION['username'];
$user_type = $_SESSION['user_type'];
?>
<!DOCTYPE html>
<html>
<head>
<title>E-Commerce</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"
	content="BOX SHOP Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link
	href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
	rel='stylesheet' type='text/css'>
<link
	href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
	rel='stylesheet' type='text/css'>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css"
	media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start slider -->
<script src="js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<!--end slider -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css"
	media="screen" />
<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo").flexisel({
					visibleItems: 5,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
			    	responsiveBreakpoints: { 
			    		portrait: { 
			    			changePoint:480,
			    			visibleItems: 1
			    		}, 
			    		landscape: { 
			    			changePoint:640,
			    			visibleItems: 2
			    		},
			    		tablet: { 
			    			changePoint:768,
			    			visibleItems: 3
			    		}
			    	}
			    });
			    
			});
		</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
</head>
<body>
	<!-- header-section-starts -->
	<div class="header">
		<div class="wrap">
			<div class="header-bottom">
				<div class="search">
					<div class="header-right">
						<ul>
							<li></li>
							<li class="user"></li>

						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<div class="wrap">
		<div class="navigation-strip">
			<a href="#"><img src="images/logo.png" class="img-responsive"
				alt="" style="display: inline-block; padding: 0 0; margin: 0 0;" />
			</a>
			<?php
			error_reporting(0);

			if($user_type == '1'){?>

			<div class="top-menu">
				<ul class="megamenu skyblue">
					<li><a href="adminhome.php">Home</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<?php }  ?>

			<?php if($user_type == '2'){?>


			<div class="top-menu">
				<ul class="megamenu skyblue">
					<li><a href="freelancerhome.php">Home</a></li>
					<li><a href="addworkshop.php">Add Workshop</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<br/><br/>

			<?php }
					?>
			
			<?php if($user_type == '3'){?>


			<div class="top-menu">
				<ul class="megamenu skyblue">
					<li><a href="userhome.php">Home</a></li>
					<li><a href="trainers.php">View Profiles</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
			<br/><br/>

			<?php }
					?>
		</div>
		<!-- start registration -->
		<section id="main">
			<div class="content">