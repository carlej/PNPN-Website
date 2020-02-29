<?php //this file is for the landgrant game. At finish it will allow you to click on the space you want and lay clame to it right then and there as well as allow bidding and such these functions are all a work in progress and have almost zero progress or work at this point?>

<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>

		<title>Land Grants</title>
		<?php include("Views\Partials/header.php");?>

		<!-- Creates the Personal and Steward Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsVol">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="landgrant.php" class="PersonalPressed4">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if ($url=="landgrant.php" && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")):?>
					<a href="landsteward.php" class="LandButton3">Steward</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if ($url=="landgrant.php" && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")):?>
					<a href="landvolunteer.php" class="LandVolunteer">Volunteer</a>
					<?php endif;?>
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
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b" || $_SESSION['perm']=="z")): ?>
						<a href="landgrant.php" class="PersonalPressed2">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if ($url=="landgrant.php" && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")):?>
					<a href="landsteward.php" class="LandButton2">Steward</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if ($url=="landgrant.php" && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")):?>
					<a href="landvolunteer.php" class="LandVolunteer2">Volunteer</a>
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
