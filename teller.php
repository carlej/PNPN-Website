<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b") {
			//echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: /PNPN-Website/bank.php");
		}
		?>
		

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views\Partials/header.php");?>
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
				<select name="type">
					<option value="Username">Username</option>
					<option value="shipID" style="display:none;">shipID</option>
					<option value="Ship">Ship/House</option>
					<option value="fleetID" style="display:none;">fleetID</option>
					<option value="Fleet">Fleet/Alliance</option>
					<option value="Pname">Pirate Name</option>
					<option value="Fname">First Name</option>
					<option value="Lname">Last Name</option>
					<option value="Email">Email</option>
					<option value="Pnumber">Phone Number</option>
					<option value="Sposition">Staff Position</option>
					<option value="Rposition">Royalty Position</option>
				</select>
				<label for="input">:</label>
				<input type="search" class="required" name="input" id="input">
				<input type="submit" name= "submit" value="Search">
				<input type="hidden" name="new" value="new">
				<p>
					<input type = "submit" name= "submit" value = "Add Ship/Household"?>
				</p>
				<p>
					<input type = "submit" name= "submit" value = "Add Fleet/Alliance"?>
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
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Ship/Household") {
		header("Location: /PNPN-Website/addShip.php");
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Fleet/Alliance") {
		header("Location: /PNPN-Website/addFleet.php");
		}
		?>
	</body>

</html>