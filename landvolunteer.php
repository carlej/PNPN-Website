<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Land Grants</title>
		<?php include("Views\Partials/header.php");?>
		
		<div class = "container-flow" id = "SwitchButtonsVol">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col" style="padding-right: 0.05em;">
						<a href="/PNPN-Website/landgrant.php" class="PersonalButton3">Personal</a>
					</div>
					<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
						<a href="/PNPN-Website/landsteward.php" class="LandButton3">Steward</a>
					</div>
					<div class = "col" style="padding-left: 0.05em;">
						<a href="/PNPN-Website/landvolunteer.php" class="LandVolunteerPressed">Volunteer</a>
					</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Code for the teller and personal buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuVol">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
					<div class = "col-lg">
						<a href="/PNPN-Website/landgrant.php" class="PersonalButton2">Personal</a>
					</div>
					<div class = "col-lg">
						<a href="/PNPN-Website/landsteward.php" class="LandButton2">Steward</a>
					</div>
					<div class = "col-lg">
						<a href="/PNPN-Website/landvolunteer.php" class="LandVolunteerPressed2">Volunteer</a>
					</div>
				</div>
			</div>
			</div>
		</div>

		
	</head>
	<body>
		
	</body>

</html>