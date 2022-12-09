<!-- Homepage-->
<!doctype html>
<html>
	<head>
		<title>Home</title>
		<?php
			include("Views/Partials/HeaderMain.php");
		?>	
		
	</head>

	<body>

		<div class="container-flow" style="max-width: 99%;">
			<div class="row no-gutters">
				<div class="col-xl-8 d-flex" id="HomeCarousel">
					<div id="CarouselControls" class="carousel slide" data-ride="carousel" data-interval="10000" style="transition: transform 6s ease-in-out left;">
					  <div class="carousel-inner">
					    <div class="carousel-item active">
					      <img class="d-block w-100" src="CSS/styles/Home Page/Scarlet Dove.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/The Nothing Duck Display.jpg" style="max-height: 55em;">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/Redemption In The Dark.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/Skelly in the Rigging.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/IMG_2238.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/Sunkn Norwegian Sign Dusk.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/DSC01305.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/Merry Gallows.jpg">
					    </div>
					    <div class="carousel-item">
					      <img class="d-block w-100" src="CSS/styles/Home Page/The Nothing Day Shot.jpg">
					    </div>
					  </div>

					  <!-- Slideshow Buttons-->
					  <a class="carousel-control-prev" href="#CarouselControls" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#CarouselControls" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
				<div class="col-xl-4 d-flex" id="AboutBoxHome">
					<div id="AboutUs">
						<p class="text-center">Welcome to the new site for the Legacy Bay Events!</p>
						<p style="font-size: 0.2em;">&nbsp</p>
						<!--<p class="text-center">Our site is currently under development but we look forward to events in 2022!</p>
						<p style="font-size: 0.2em;">&nbsp</p>
						<p class="text-center">Registration for both of our 2022 events is open!</div>-->
				</div>
			</div>
		</div>

	</body>
</html>