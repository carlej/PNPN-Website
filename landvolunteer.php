<!doctype html>
<html>
	<head>
		<?php 
		include("Javascript/Connections/req.php"); 
		if ($_SESSION['perm']!="d" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>

		<title>Land Volunteer</title>
		<?php include("Views/Partials/header.php");?>

		<!-- Creates the Personal and Steward Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col" style="padding-right: 0.05em;">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landgrant.php" class="LeftButtonThreeUn">Personal</a>
						<?php endif;?>
					</div>
					<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landsteward.php" class="MiddleButtonThreeUn">Steward</a>
						<?php endif;?>
					</div>
					<div class = "col" style="padding-left: 0.05em;">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landvolunteer.php" class="RightButtonThreePressed">Volunteer</a>
						<?php endif;?>
					</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Creates the Personal and Steward Buttons once the page is shrunk -->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
					<div class = "col-lg">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landgrant.php" class="MenuButtonUn">Personal</a>
						<?php endif;?>
					</div>
					<div class = "col-lg">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landsteward.php" class="MenuButtonUn">Steward</a>
						<?php endif;?>
					</div>
					<div class = "col-lg">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landvolunteer.php" class="MenuButtonPressed">Volunteer</a>
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