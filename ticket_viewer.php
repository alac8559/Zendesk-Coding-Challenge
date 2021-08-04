<?php

	// The page to display (Usually is received in a url parameter)
	$page = intval($_GET['page']);


	// The number of records to display per page
	$page_size = 25;


?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Home</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</head>
	<body class="homepage">

		<!-- Header -->
		<div id="header">
			<div id="nav-wrapper">
				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li class="active"><a href='#'>Zendesk Ticket Viewer</a></li>
					</ul>
				</nav>
			</div>
		</div>

	<!-- Main -->

		<div id="main">
			<div id="content" class="container">

				<div class="row">
					<section class="6u">
						<a href="multiple_tickets_1.php" class="image full"><img src="img/multiple_tickets.jpg" alt=""></a>
						<header>
							<h2><a href="multiple_tickets_1.php">View All Tickets</a></h2>
						</header>
						<p></p>
					</section>
					<section class="6u">
						<a href="individual_ticket.php" class="image full"><img src="img/one_ticket.jpg" alt=""></a>
						<header>
							<h2><a href="individual_ticket.php">Individual Ticket Details</a></h2>
						</header>
						<p></p>
					</section>
				</div>

			</div>
		</div>


		<div id="copyright">
			<div class="container">
				Images: <a href="http://unsplash.com">Unsplash</a>
			</div>
		</div>

	</body>
</html>
