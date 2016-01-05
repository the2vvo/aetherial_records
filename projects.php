<!doctype html>

<!--
Dillon Bastan, 2015.
This is the PHP doc for the projects page, indexing the individual projects.
-->

<html>
	
	<head>

		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

		<script type = "text/javascript" src = "js/all.js"></script>
		<script type = "text/javascript" src = "js/projectsIndex.js"></script>

		<link rel = "stylesheet" type = "text/css" href = "css/all.css"/>
		<link rel = "stylesheet" type = "text/css" href = "css/headerFooter.css"/>
		<link rel = "stylesheet" type = "text/css" href = "css/projectsIndex.css"/>

		<meta charset = "utf-8"/>

		<title>AETHERIAL.projects</title>
		<link rel="shortcut icon" href="images/logo.ico">

	</head>

	<body>

		<!-- Beign Header -->
		<div id = "headerWrapper">
			<header>

				<figure class = "header">
					<a href="home.html">
						<img src="images/logo.png" alt="logo"/>
					</a>
				</figure>

				<nav class = "header">
					<a href="about.html">ABOUT</a>
					<a href="artists.html">ARTISTS</a>
					<a href="releases.html">RELEASES</a>
					<a href="projects.html"><em>PROJECTS</em></a>
				</nav>

			</header>
		</div>
		<!-- End Header -->

		<!-- Beign Main Content -->
		<div id = "contentWrapper">
			<section class = "mainContent">

				<!-- Slideshow Images-->
		        <section class = "slideshow">

		        	<span class="move prevImage">&lt;</span>

		        	<div class = "slideshow">
		        		<ul class = "slideshow"></ul>
		        	</div>

		        	<span class="move nextImage">&gt;</span>

		        </section>
		        <!-- End Slideshow Images-->

		        <section class="projectInfo">

		        	<h1 id="projectTitle"></h1>
			        <p class="projectInfo">
			        	Project not found, sorry!
			        </p>

		        </section>

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


		<!-- PHP to Determine which project to display -->
		<?php

			//Has the function for filtering input
			include 'php/inputFilter.php';

			if (isset($_GET['projectName'])) {

				$projectName = input_filter($_GET['projectName']);

				//Render the content of the selected project as HTML
				echo "<script> renderProject('$projectName'); </script>";

			} else
				echo "<script> alert('ERROR: No Project Selected); </script>";

		?>

	</body>

</html>