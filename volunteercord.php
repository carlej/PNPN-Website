<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")) {
			$usename = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: bank.php");
		}
		?>

		<title>Volunteering</title>
		<?php include("Views/Partials/header.php");?>


		<!-- Creates the Personal, Coordinator, and Charter Buttons -->
		<div class = "container-flow" id = "SwitchButtonsVol">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col" style="padding-right: 0.05em;">
						<a href="volunteer.php" class="PersonalButton3">Personal</a>
					</div>
					<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
						<a href="volunteercord.php" class="CordPressed3">Coordinator</a>
					</div>
					<div class = "col" style = "padding-left: 0.05em;">
						<a href="chartercord.php" class="CharterButton">Charter/Land Grant</a>
					</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuVol">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<a href="volunteer.php" class="PersonalButton2">Personal</a>
				</div>
				<div class = "col-lg" style = "padding-left: 0.05em;">
					<a href="volunteercord.php" class="CordPressed2">Coordinator</a>
				</div>
				<div class = "col-lg">
					<a href="chartercord.php" class="CharterButton2">Charter/Land Grant</a>
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