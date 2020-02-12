<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b") {
			$usename = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: /PNPN-Website/bank.php");
		}
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views\Partials/header.php");?>
		
		
		<div class = "container-flow" id = "SwitchButtons">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col-6" style="padding-right: 0.05em;">
						<a href="/PNPN-Website/bank.php" class="PersonalButton">Personal</a>
					</div>
					<div class = "col-6" style = "padding-left: 0.05em;">
						<a href="/PNPN-Website/teller.php" class="TellerPressed">Teller</a>
					</div>
				</div>
			</div>
		</div>



	</head>
	<body>
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			include 'Javascript/Connections/convar.php';
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		}
		mysqli_close($con);
		//creates the basic inputs for the search file to find an user/account?>
		<form method="POST" id="search">
			<fieldset>
				<label>Search by:</label>
				<select name="type" class="SearchBy">
					<option value="Pname">Pirate Name</option>
					<option value="Fname">First Name</option>
					<option value="Lname">Last Name</option>
					<option value="Username">Email</option>
					<option value="shipID" style="display:none;">shipID</option>
					<option value="Ship">Ship/House</option>
					<option value="fleetID" style="display:none;">fleetID</option>
					<option value="Fleet">Fleet/Alliance</option>
				</select>
				<input type="search" class="required" name="input" id="input" style="width: 38em">
				<input type="submit" name= "submit" value="Search" class="submit">
				<input type="hidden" name="new" value="new" class="submit">
				<p>
					<input type = "submit" name= "submit" value = "Add Ship/Household"? class="submit2">
				</p>
				<p>
					<input type = "submit" name= "submit" value = "Add Fleet/Alliance"? class="submit3">
				</p>
			</fieldset>
		</form>

		<?php 
		error_reporting(E_ERROR);
		if ($_POST['new']) {
			$_SESSION['hold']="hold";
		}
		if ($_SESSION['hold']!="hold") {
			$_SERVER["REQUEST_METHOD"] = "POST";
			$_POST['submit'] = "Search";
			$_POST['type']=$_SESSION['stype'];//"Username";
			$_POST['input']=$_SESSION['hold'];
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
			include "Javascript/search.php";
			//echo $_POST['input'];
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Ship/Household") {
		//header("Location: /PNPN-Website/addShip.php");
			include("addShip.php");
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Fleet/Alliance") {
		header("Location: /PNPN-Website/addFleet.php");
		}
		?>
	</body>

</html>