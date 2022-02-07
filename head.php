<?php
    include "connect_db.php";
    session_start();
    // Initialize shopping cart class 
    include_once 'model/Cart.class.php'; 
    $cart = new Cart;
?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-149706919-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-149706919-1');
    </script>

<head><meta charset="ibm866">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barendro.com ।। Online Shopping Site in Rajshahi</title>
	
	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="images/favicon.png" alt="image">
	
	<!-- Meta Tags -->	
	<meta name="description" content="Barendro.com is one of the best Online Marketplace and largest online shop at Rajshahi in Bangladesh.We provide shoppers with a hassle-free international shopping experience from buying to delivery.">
    <link rel="canonical" href="http://www.barendro.com">
	<meta name="robots" content="INDEX,FOLLOW" />
	<meta name="google-site-verification" content="C0cTC9Dx8-uAcw-xwfz_1_c779A2K2dgn0H4KMoRBbo" />
	
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css">
	<script src="https://use.fontawesome.com/bf5fc1365b.js"></script> 
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/magnific-popup.min.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link href="css/jquery.scrollbar.min.css" rel="stylesheet">
	<link href="css/chosen.min.css" rel="stylesheet">
	<link href="css/ovic-mobile-menu.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/customs-css3.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	
	
		<!-- Mobile specific metas  , -->
    <meta property="og:image" content="images/logo-barendro.png" /> 
    <meta property="og:type" content="ecommerce" />
    <meta property="og:url" content="http://www.barendro.com/" />
    <meta property="og:description" content="Online Shopping site in Rajshahi, Rajshahi Online Shop, Rajshahi Gift Shop, Online Rajshahi Bazar" />
    <meta property="og:title" content="Online Shopping in Rajshahi" />
    <meta property="og:site_name" content="Barendro" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="BarendroC">
    <meta name="twitter:title" content="Online Shopping site in Rajshahi">
    <meta name="twitter:description" content="Barendro.com is one of the best Online Marketplace and largest online shop at Rajshahi in Bangladesh.We provide shoppers with a hassle-free international shopping experience from buying to delivery.">
    <meta name="twitter:image" content="https://twitter.com/BarendroC/photo">
    <meta name="twitter:image:alt" content="Logo">
	
	
	
	
</head>
<body class="home" ng-app="barendro">
	<header>
	    <!--<div><a href="sections.php?code=19"><span class="flag"><center><img src="images/header-mango.jpg" alt="Mango"></center></div>-->
		<!--<div class="header layout2 no-prepend-box-sticky header-home3">
			<div class="topbar layout1">
				<div class="container">
					<ul class="menu-topbar">
						<li class="language menu-item-has-children">
							<a href="#" class="toggle-sub-menu"><span class="flag"><img src="images/flag1.jpg" alt="image"></span> English</a>
							<ul class="list-language sub-menu">
								<li><a href="#"><span class="flag"><img src="images/flag-BD.png" alt="image"></span> Bangla</a></li>
							</ul>
						</li>
					</ul>
					<ul class="menu-topbar top-links">
						<li><a href="login.php">Register / Sign in</a></li>
					</ul>
				</div>
			</div>-->
			<div class="main-header">
				<div class="top-header">
					<div class="this-sticky">
						<div class="container">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-3 col-xs-6  left-content">
									<div class="logo">
										<a href="index.php"><img src="images/logo-barendro.png" alt="logo"></a>
									</div>
								</div>
								<div class="col-lg-6 col-md-4 col-sm-4 col-xs-6 midle-content">
								  <div class="search-form layout2 box-has-content">
									<div class="search-block">
										<div class="search-inner">
											<input type="text" class="search-info" id="txtSearch" placeholder="What are you looking for ?...">
										</div>
										<a href="#" class="search-button" id="btnSearch"><i class="fa fa-search" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
								<div class="col-lg-4 col-md-5 col-sm-5 col-xs-6 right-content">
									<ul class="header-control">
									    <li class="box-minicart">
											<div class="cart-block  box-has-content">
											  <a href="shopping-cart.php" class="cart-icon"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="count"><?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'0'; ?></span></a>
											</div>
										</li>
										<?php
										if($_SESSION["UserName"]!=""){
										?>
										
										<li class="box-minicart">
											<div class="cart-block  box-has-content">
											    Hi, <? echo $_SESSION["UserName"]; ?> | <a href="logout.php">Logout</a>
											</div>
										</li>
										<?php
										}else{
										?>
										<li class="box-minicart">
											<div class="cart-block  box-has-content">
											    <a href="login.php">REGISTER</a>
											</div>
										</li>
									    <li class="box-minicart">
											<div class="cart-block  box-has-content">
											    <a href="login.php">SIGN IN</a>
											</div>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				