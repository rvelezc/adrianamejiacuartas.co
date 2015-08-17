<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<!-- Loading: Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>

		<title><?= isset($PageTitle) ? $PageTitle : "Default Title"?></title>

		<!-- Loading: Normalize, Grid -->
		<link rel="stylesheet" href="assets/css/normalize.css" media="screen">
		<link rel="stylesheet" href="assets/css/grid.css" media="screen">

		<!-- Loading: Extra Stylesheets -->
		<link rel="stylesheet" href="assets/css/animate.min.css" media="screen">

		<link rel="stylesheet" href="assets/js/plugins/owl-carousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="assets/js/plugins/owl-carousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="assets/js/plugins/owl-carousel/owl.transitions.css" media="screen">

		<link rel="stylesheet" href="assets/js/plugins/easy-responsive-tabs/easyresponsivetabs.css" media="screen">

		<link rel="stylesheet" href="assets/js/plugins/magnific-popup/jquery.magnific-popup.css" media="screen">

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

		<!-- Loading: Styles -->
		<!--<link rel="stylesheet/less" href="assets/less/style.less" media="screen">-->
		<link rel="stylesheet" href="assets/css/style.css" media="screen">
		
		<!-- Custom Styles -->
		<link rel="stylesheet" href="assets/css/custom.css" media="screen">

		<!-- Loading Modenizr -->
		<script src="assets/js/modernizr.min.js"></script>

		<!--[if lt IE 9]>
		<script src="assets/js/html5.min.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<script>
  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  			ga('create', 'UA-65450267-1', 'auto');
  			ga('send', 'pageview');

		</script>
		<!-- Additional tags here -->
		<?php if (function_exists('customPageHeader')){
		  customPageHeader();
		}?>
	</head>

	<body class="home">

    <!-- Start: Header -->
		<header id="header">
			<div class="q-container">
				<div id="logo">
					<a class="hide-mobile" href="index.php"><img src="assets/img/logo.png" alt=""></a>
                                        <a class="show-mobile" href="index.php"><img src="assets/img/logo-small.png" alt=""></a>
				</div>
                                
				<nav id="nav">
					<a href="#" id="nav-toggle" title="Navigation"><i class="fa fa-bars"></i></a>
					<ul>
						<li><a href="index.php">Bienvenido<span><B>Hola</B></span></a></li>
						<li><a href="perfil.php">Acerca de Adriana<span><B>Origen - Perfil - Acción</B></span></a></li>
                        <li><a href="propuestas.php">Mis Propuestas<span><B>Presentación - Ideas</B></span></a></li> 
						<li class="nav-special nav-reverse">
							<a href="contacto.php">Involúcrate</a>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<!-- End: Header -->
