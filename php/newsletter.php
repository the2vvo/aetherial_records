<?php
/*
Dillon Bastan 2015.
This is a PHP function for adding a client to a newsletter.
*/

//Has the function for filtering input
include 'inputFilter.php';
$clientEmail = input_filter($_POST['clientEmail']);

$masterEmail = "admin@aetherialrecords.com";
$subject = "Add to newsletter";
$msg = "Add $clientEmail to the newsletter system.";
$headers = "From: newsletter@aetherialrecords.com";
$headers .= "Reply-To: $clientEmail";

$sendStatus = mail($masterEmail, $subject, $msg, $headers);

if($sendStatus)
	$sendStatus = "Successfully Added!";
else
	$sendStatus = "Addition Unsuccessful!";

?>




<!doctype html>
<html>

	<head>

		<link rel = "stylesheet" type = "text/css" href = "../css/all.css"/>

		<meta charset = "utf-8"/>
		<title>AETHERIAL.newsletter</title>
		<link rel="shortcut icon" href="../images/logo.ico"/>

	</head>

	<body>

		<div id = "contentWrapper">
			<section class = "mainContent">
				<p>
					<?php echo $sendStatus; ?>
				</p>

				<a href="../home.html">return</a>

			</section>
		</div>

	</body>

</html>