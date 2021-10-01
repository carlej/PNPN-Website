<!doctype html>
<html>
	<head>
		
		<?php
			include("Views/Partials/HeaderMain.php");
		?>	
		
	</head>

	<body>
		<div class="container-flow">
			<div class = "row no-gutters">
				<div class="col-xl d-flex flex-column" id="EventBanner">

					<!--Event Banner-->
					<img class="mx-auto d-block" src="CSS/styles/TortugaBanner.png" style="margin-top: 0.5em; width: 98%; height: auto; overflow: hidden;">

				</div>
			</div>
		</div>
		
		<div class="container-flow">
			<!--Left Navigation Column-->
			<div class = "row no-gutters">
				<div class="col-xl-3 d-flex flex-column" id="EventLeftColumn">
					<div class = "justify-content-center">

						<!--Countdown-->
						<div class="Countdown">Countdown</div>
						<div class="col">
							<div id="CountdownBox">
								<div>
									<div id="TortugaEventCountdown"></div>
								</div>
							</div>
						</div>
						<script>
							// Set the date we're counting down to
							var countDownDate = new Date("September 2, 2022 08:00:").getTime();

							// Update the count down every 1 second
							var x = setInterval(function() {

							  // Get today's date and time
							  var now = new Date().getTime();

							  // Find the distance between now and the count down date
							  var distance = countDownDate - now;

							  // Time calculations for days, hours, minutes and seconds
							  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
							  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

							  // Display the result in the element with id=""
							  document.getElementById("TortugaEventCountdown").innerHTML = days + " days  " + hours + " hours  "
							  + minutes + " min";

							  // If the count down is finished, write some text
							  if (distance < 0) {
							    clearInterval(x);
							    document.getElementById("TortugaEventCountdown").innerHTML = "It's Time!";
							  }
							}, 1000);
						</script>

						<!--Navigation-->
						<div class="EventNavigationTitle">Navigation</div>
						<div class="col">
							<div class = "EventNavigation">
								<div style="font-size: 1.3em; padding-left: 0.6em; color: rgb(128,128,128);">Registration</div>
								<div id="PreReg" style="font-size: 1.1em; padding-left: 3em; color: rgb(255,255,255);">Pre-Registration
										<a href="TN-PreRegistration.php"></a>
								</div>

								<div style="font-size: 1.1em; padding-left: 3em;" href="TN-PrivateBiffie.php">Private Biffie</div>
								<div style="font-size: 1.1em; padding-left: 3em; padding-bottom: 0.5em;" href="TN-Merchants.php">Merchants</div>

								<div style="font-size: 1.3em; padding-left: 0.6em; padding-top: 0.5em; color: rgb(128,128,128);">Camping</div>
								<div style="font-size: 1.1em; padding-left: 3em;" href="TN-Map.php">Map</div>
								<div style="font-size: 1.1em; padding-left: 3em; padding-bottom: 0.5em;" href="LandGrants.php">Land Grants</div>

								<div style="font-size: 1.3em; padding-left: 0.6em; padding-top: 0.5em; color: rgb(128,128,128);" href="TN-EventProgram">Event Program</div>

								<div style="font-size: 1.3em; padding-left: 0.6em; padding-top: 0.5em; color: rgb(128,128,128);" href="Volunteer.php">Volunteer</div>

								<div style="font-size: 1.3em; padding-left: 0.6em; padding-top: 0.5em; color: rgb(128,128,128);">Accomodations</div>
								<div style="font-size: 1.1em; padding-left: 3em;" href="TN-Accessibility.php">Accessibility</div>
							</div>
						</div>
					</div>
				</div>

				<!--Right Information Column-->
				<div class="col-xl-9 d-flex flex-column" id="EventRightColumn">

					<!--Slide Show-->
					<div class = "d-block">
						<div id="CarouselControlsEventPage" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="CSS/styles/DSC_0763.jpg">
						    </div>
						  </div>
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
				</div>
			</div>
		</div>

		<!--The Crown and other stuff-->
		<div class="container-flow">
			<div class = "row no-gutters">

				<!--The Crown and other stuff-->
				<div class="col-md d-flex flex-column justify-content-center" id="CrownTournament">
					<div class="Crown">The Crown Tournament</div>
					<div class="CrownComp">Contenders coming August 2022!</div>
				</div>
				
			</div>
		</div>
		<div class="container-flow">
			<div class = "row no-gutters">
				<div class="col-md d-flex flex-column justify-content-center" id="PirateOlympics">
					<div class="Olympics">Pirate Olympics</div>
					<div class="OlympicsComp">Events and Registration coming August 2022!</div>
				</div>
				
			</div>
		</div>

				</div>

				<!--Blog-->
				<div class="row no-gutters">

				</div>

			</div>


			</div>
		</div>
	</body>
</html>