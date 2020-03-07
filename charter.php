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

		<!-- Creates the Personal and Charter Buttons for regular users-->
		<div class = "container-flow" id = "SwitchButtonsTwo">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<a href="volunteer.php" class="LeftButtonTwoUn">Personal</a>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<a href="charter.php" class="RightButtonTwoPressed">Charter/Land Grant</a>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<a href="volunteer.php" class="MenuButtonUn">Personal</a>
				</div>
				<div class="col-lg" style="padding-right: 0.05em" >
					<a href="charter.php" class="MenuButtonPressed">Charter/Land Grant</a>
				</div>
				</div>
			</div>
			</div>
		</div>
	</head>
	<body>
		<div class = "container-flow">
			<div class = "d-flex justify-content-center">
				<div class="row" id="ComingSoon">
					Coming Soon!!
				</div>
			</div>
		</div>
	</body>
</html>
