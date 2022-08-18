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
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
				<div class = "d-flex justify-content-center">
					<div class = "row" id ="ButtonsRow">
						<div class = "col" style="padding-right: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
								<a href="landgrant.php" class="LeftButtonThreePressed">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landsteward.php" class="RightButtonThreeUn">Steward</a>
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
								<a href="landgrant.php" class="MenuButtonPressed">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col-lg">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")): ?>
							<a href="landsteward.php" class="MenuButtonUn">Steward</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</head>
	<body>
		<div class = "container-flow">
			<div class = "d-flex justify-content-center">
				<div class="d-none d-lg-block">
					<div style="padding-top: 6em; padding-right: 18em;">
						<img src='Views\Photos\tmp.jpg' alt='photo' />
					</div>
				</div>
				<div class="d-lg-none">
				</div>
			</div>
		</div>
	</body>

</html>
