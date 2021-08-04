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
						<li><a href='ticket_viewer.php'>Zendesk Ticket Viewer</a></li>
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
					$ch2 = curl_init();
					$cert_location = '/etc/pki/yls/certs/cacert.pem';

					// set url
					curl_setopt($ch, CURLOPT_URL, "https://zccboulder.zendesk.com/api/v2/tickets/" . $_GET["ticketid"] . ".json");
					curl_setopt($ch, CURLOPT_USERPWD , "alac8559@colorado.edu/token:Wcl5UIQVPdRlAmvMmBqOoMCwjHbGzNaPwmH4Yf4e");
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $cert_location);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $cert_location);
					//return the transfer as a string
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

					// $output contains the output string
					$output = curl_exec($ch);

					// set url
					curl_setopt($ch2, CURLOPT_URL, "https://zccboulder.zendesk.com/api/v2/tickets/count.json");
					curl_setopt($ch2, CURLOPT_USERPWD , "alac8559@colorado.edu/token:Wcl5UIQVPdRlAmvMmBqOoMCwjHbGzNaPwmH4Yf4e");
					curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, $cert_location);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, $cert_location);
					//return the transfer as a string
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);

					// $output contains the output string
					$output2 = curl_exec($ch2);
						
					if ($output == FALSE) {
						die("cURL Error: " . curl_error($ch));
					}elseif ($output2 == FALSE) {
						die("cURL Error: " . curl_error($ch2));
					}else{
						$arr = json_decode($output, true);
						$arr2 = json_decode($output2, true);

						foreach($arr2 as $key => $value) {
							if ($key == "count"){
								$total_tickets = $value['value'];
							}

						}

						if ($total_tickets > $_GET["ticketid"] && $_GET["ticketid"] > 0){
							foreach($arr as $key => $value) {
								if ($key == "ticket"){
									echo "<b>Ticket ID:</b> " . $value['id'] .
									"<br><br> <b>Subject:</b> " . $value['subject'] .
									"<br><br> <b>Description:</b> " . $value['description'] .
									"<br><br> <b>Priority:</b> " . $value['priority'] .
									"<br><br> <b>Status:</b> " . $value['status'] .
									"<br><br> <b>Assignee ID:</b> " . $value['assignee_id'] .
									"<br><br> <b>Submitter ID:</b> " . $value['submitter_id'] .
									"<br><br> <b>Requester ID:</b> " . $value['requester_id'] .
									"<br><br> <b>Updated At:</b> " . $value['updated_at'] .
									"<br><br> <b>URL:</b> " . $value['url'] . "<br>";
								}
							}
						}else{
							die("Error: No Matching Ticket ID");
						}
					}

						// close curl resource to free up system resources
						curl_close($ch);

					?>

			</div>
		</div>


		<div id="copyright">
			<div class="container">
				Images: <a href="http://unsplash.com">Unsplash</a>
			</div>
		</div>

	</body>
</html>
