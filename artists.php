<!doctype html>

<!--
Dillon Bastan, 2015.
This is the PHP doc for the artists page, indexing the individual artists.
-->

<html>
	
	<head>

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	
		<script type = "text/javascript" src = "js/all.js"></script>
		<script type = "text/javascript" src = "js/artistsIndex.js"></script>

		<link rel = "stylesheet" type = "text/css" href = "css/all.css"/>
		<link rel = "stylesheet" type = "text/css" href = "css/headerFooter.css"/>
		<link rel = "stylesheet" type = "text/css" href = "css/artistsIndex.css"/>

		<meta charset = "utf-8"/>
		<title>AETHERIAL.artists</title>
		<link rel="shortcut icon" href="images/logo.ico">

	</head>

	<body>

		<!-- Beign Header -->
		<div id = "headerWrapper">
			<header>

				<figure class = "header">
					<a href="home.html">
						<img src="images/logo.png"/>
					</a>
				</figure>

				<nav class = "header">
					<a href="about.html">ABOUT</a>
					<a href="artists.html"><em>ARTISTS</em></a>
					<a href="releases.html">RELEASES</a>
					<a href="projects.html">PROJECTS</a>
				</nav>

			</header>
		</div>
		<!-- End Header -->

		<!-- Beign Main Content -->
		<div id = "contentWrapper">
			<section class="mainContent">

				<table class="mainContent">
					<tr>

						<td class="artistPhoto">
							<figure>
								<img class="artistPhoto" id="artistPhoto" src="" alt=""/>
							</figure>
						</td>

						<td>
							<h1 id="artistName"></h1>
							<p id="artistDescription">
								Artist not found, sorry!
							</p>
							<nav id="projectLinks"></nav>
						</td>
						
					</tr>
				</table>

			</section>
		</div>
		<!-- End Main Content -->

		<!-- Beign Footer -->
		<div id = "footerWrapper">
			<footer>

				<nav class = "footer">
					<a href="http://www.facebook.com/">facebook</a>
					<a href="http://www.youtube.com">youtube</a>
					<a href="http://www.soundcloud.com">soundcloud</a>
					<a href="http://www.bandcamp.com">bandcamp</a>
				</nav>

				<div class = "footer">
					<a href="services.html">services</a>
					<p id="newsletterButton">newsletter</p>
					<a href="mailto:someone@somewhere.com">contact</a>
					<p>2015 &copy;</p>
				</div>

				<div id="newsletterInput">
					<form method="POST" action="php/newsletter.php"/>
						<input type="email" name="clientEmail" required/>
						<input type="submit"/>
						<p id="newsletterConfirm"></p>
					</form>
				</div>

			</footer>
		</div>
		<!-- End Footer -->


		<!-- PHP to Determine which artist to display -->
		<?php

			//Has the function for filtering input
			include 'php/inputFilter.php';

			if (isset($_GET['artistName'])) {

				$artistName = input_filter($_GET['artistName']);

				//Render the content of the selected artist as HTML
				echo "<script> renderArtist('$artistName'); </script>";

			} else
				echo "<script> alert('ERROR: No Artist Selected); </script>";

		?>

	</body>

</html>