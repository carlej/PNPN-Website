<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>

		<title>Charter</title>
		<?php include("Views\Partials/header.php");?>

		<!-- Creates the Personal, Coordinator, and Charter Buttons -->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
				<div class = "d-flex justify-content-center">
					<div class = "row" id ="ButtonsRow">
						<div class = "col" style="padding-right: 0.05em;">
							<a href="volunteer.php" class="LeftButtonThreeUn">Personal</a>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<a href="volunteercoord.php" class="MiddleButtonThreeUn">Coordinator</a>
						</div>
						<div class = "col" style = "padding-left: 0.05em;">
							<a href="chartercoord.php" class="RightButtonThreePressed">Charter/Land Grant</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<a href="volunteer.php" class="MenuButtonUn">Personal</a>
				</div>
				<div class = "col-lg" style = "padding-left: 0.05em;">
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
				</div>
				<div class = "col-lg">
					<a href="chartercoord.php" class="MenuButtonPressed">Charter/Land Grant</a>
				</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</head>
	<body>

	</body>
</html>
