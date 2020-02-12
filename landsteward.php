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
		
		<div class = "container-flow" id = "SwitchButtons">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col-6" style="padding-right: 0.05em;">
						<a href="/PNPN-Website/landgrant.php" class="PersonalButton">Personal</a>
					</div>
					<div class = "col-6" style = "padding-left: 0.05em;">
						<a href="/PNPN-Website/landsteward.php" class="LandPressed">Steward</a>
					</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Code for the teller and personal buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenu">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-sm-6">
						<a href="/PNPN-Website/landgrant.php" class="PersonalButton2">Personal</a>
					</div>
					<div class = "col-sm-6">
						<a href="/PNPN-Website/landsteward.php" class="LandPressed2">Steward</a>
				</div>
				</div>
			</div>
			</div>
		</div>

		
	</head>
	<body>
		
	</body>

</html>