<?php //this file is for the landgrant game. At finish it will allow you to click on the space you want and lay clame to it right then and there as well as allow bidding and such these functions are all a work in progress and have almost zero progress or work at this point?>

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

		<!-- Creates the Personal and Steward Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtons">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col-6" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b"): ?>
						<a href="/PNPN-Website/landgrant.php" class="PersonalPressed">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col-6" style = "padding-left: 0.05em;">
					<?php if ($url=="/PNPN-Website/landgrant.php"):?>
					<a href="/PNPN-Website/landsteward.php" class="LandButton">Steward</a>
					<?php endif;?>
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
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b"): ?>
						<a href="/PNPN-Website/landgrant.php" class="PersonalPressed2">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col-sm-6">
					<?php if ($url=="/PNPN-Website/landgrant.php"):?>
					<a href="/PNPN-Website/landsteward.php" class="LandButton2">Steward</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</head>
	<body>
		
	</body>

</html>
