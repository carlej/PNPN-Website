<!doctype html>
<html>
	<head>
		<?php 
		include("Javascript/Connections/req.php");
		if ($_SESSION['perm']!="c" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		?>

		<title>Charter</title>
		<?php include("Views/Partials/header.php");?>

		<!-- Creates the Personal, Coordinator, and Charter Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsFour">
			<div class="d-none d-xl-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonFourUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonFourUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MiddleButtonFourUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="RightButtonFourPressed">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-xl-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="MenuButtonUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MenuButtonUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="MenuButtonPressed">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>

	</head>
	<body>
		<form method="POST">
			<fieldset>
				<input type="submit" name="delim" value="Charter">
				<input type="submit" name="delim" value="Langrant">
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if ($_POST['delim']=='Charter') {
				$queryCharter = "SELECT * FROM charter";
				$resultCharter = mysqli_query($con,$queryCharter);
				$array = $resultCharter->fetch_all(MYSQLI_NUM);
				foreach ($array as $key => $value) {
					echo $value[0];
				}
			}
			else if ($_POST['delim']=="Langrant") {
				# code...
			}
		}
		?>
	</body>
</html>
