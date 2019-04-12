<!doctype html>
<html>
	<head>
		<?php include("Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else
			echo "Please login to view this page.";//<script type="text/javascript" src="Javascript/bankscript.js"></script>
		?>
		

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			include 'Connections/convar.php';
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];

		}
		mysqli_close($con);
		?>
		<form method="POST" id="search">
			<fieldset>
				<label>Search by:</label>
				<select name="type">
					<option value="Username">Username</option>
					<option value="ID">Account Number</option>
					<option value="Ship">Ship/House</option>
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
				<input type="text" class="required" name="input" id="input">
				<input type="submit" name= "submit" value="Submit">
			</fieldset>
		</form>
		<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {
		include "Javascript/search.php"; }?>
	</body>

</html>