<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>
		
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Volunteering</title>
		<?php include("Views\Partials/header.php");?>

		<div class = "container-flow" id = "SwitchButtons">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col-6" style="padding-right: 0.05em;">
						<a href="/PNPN-Website/volunteer.php" class="PersonalButton">Personal</a>
					</div>
					<div class = "col-6" style = "padding-left: 0.05em;">
						<a href="/PNPN-Website/volunteer.php" class="CordPressed">Coordinator</a>
					</div>
				</div>
			</div>
		</div>

	</head>
	<body>
		
	</body>

</html>