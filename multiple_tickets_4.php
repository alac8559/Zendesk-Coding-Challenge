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
						<li ><a href='ticket_viewer.php'>Zendesk Ticket Viewer</a></li>
					</ul>
				</nav>
			</div>
		</div>

	<!-- Main -->

		<div id="main">
			<div id="content" class="container">
				<?php

					// create curl resource
					$ch = curl_init();
					$cert_location = '/etc/pki/yls/certs/cacert.pem';

					// set url
					curl_setopt($ch, CURLOPT_URL, "https://zccboulder.zendesk.com/api/v2/requests.json");
					curl_setopt($ch, CURLOPT_USERPWD , "alac8559@colorado.edu/token:Wcl5UIQVPdRlAmvMmBqOoMCwjHbGzNaPwmH4Yf4e");
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $cert_location);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $cert_location);
					//return the transfer as a string
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

					// $output contains the output string
					$output = curl_exec($ch);

					$ticket_count = 0;
					$total_pages = 0;
					$data = [];

					if ($output == FALSE) {
						die("cURL Error: " . curl_error($ch));
					}else{
						$arr = json_decode($output, true);
						foreach($arr as $key => $value) {

							foreach($value as $key2) {
								array_push($data, $key2);
								$ticket_count++;
							}
						}

						$total_pages = ceil($ticket_count / $page_size);
						// Validation: Page to display can not be greater than the total number of pages
						if ($page > $total_pages) {
						    $page = $total_pages;
						}

						// Validation: Page to display can not be less than 1
						if ($page < 1) {
						    $page = 1;
						}

						// Calculate the position of the first record of the page to display
						$offset = ($page - 1) * $page_size;

						// Get the subset of records to be displayed from the array
						$data = array_slice($data, $offset, $page_size);

						foreach($data as $key3 => $value3) {
							echo "<b>Ticket ID:</b> " . $value3['id'] . " |  <b>Subject:</b> " . $value3['subject'] . " |  <b>Description:</b> " . $value3['description'] . " |  <b>Status:</b> " . $value3['status'] . "<br> <br>";
						}


					}


					// close curl resource to free up system resources
					curl_close($ch);
					
					$count_page = 1;
					while($total_pages >= $count_page){
						echo "<a href=multiple_tickets_" . $count_page . ".php?page=" . $count_page . ">  " . $count_page . "  </a>";
						$count_page++;
					} ?>

			</div>
		</div>


		<div id="copyright">
			<div class="container">
				Images: <a href="http://unsplash.com">Unsplash</a>
			</div>
		</div>

	</body>
</html>
