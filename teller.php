<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b") {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: /SDN-Website/bank.php");
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
				<input type="search" class="required" name="input" id="input">
				<input type="submit" name= "submit" value="Search">
				<input type="hidden" name="new" value="new">
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
			$_POST['type']="Username";
			$_POST['input']=$_SESSION['hold'];
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
		include "Javascript/search.php";
		}
//		if ($searchUserName) {
//			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//			if (!$con) {
//				die('Could not connect: ' . mysql_error());
//			}
//			$queryIn = "SELECT Accounts FROM users WHERE Username = '$searchUserName'";
//			$resultIn = mysqli_query($con, $queryIn);
//			$row1=mysqli_fetch_row($resultIn);
//			$parsed_json = json_decode($row1[0], true);
//			$parsed_json = $parsed_json['id'];
//			include "Views/Partials/showAccs.php";
//			mysqli_close($con);
//			$perm = $_SESSION['perm'];
//			include("Javascript/transcript.php");
//			$_SESSION['hold']=$searchUserName;
//		}
//		$searchUserName=NULL;
		?>
	</body>

</html>