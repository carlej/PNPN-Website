<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else{
			header ("location:/SDN-Website/login.php");
			echo "Please login to view this page.";
		}
		?>
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>
		<?php
		include 'Javascript/Connections/convar.php';
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];
			$parsed_ship_json=NULL;
			$parsed_fleet_json=NULL;
			$queryIn = "SELECT * FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			if ($row[7]!=NULL) {
				$queryShip= "SELECT Accounts FROM ship WHERE ID = '$row[7]'";
				$resultShip = mysqli_query($con, $queryShip);
				$rowShip=mysqli_fetch_row($resultShip);
				$parsed_ship_json=json_decode($rowShip[0],true);
				$parsed_ship_json=$parsed_ship_json['id'];
			}
			if ($row[6]!=NULL){
				$queryFleet= "SELECT Accounts FROM fleet WHERE ID = '$row[6]'";
				$resultFleet = mysqli_query($con, $queryFleet);
				$rowFleet=mysqli_fetch_row($resultFleet);
				$parsed_fleet_json=json_decode($rowFleet[0],true);
				$parsed_fleet_json=$parsed_fleet_json['id'];
			}
			include "Views/Partials/showAccs.php";
			include "Views/Partials/showhist.php";
			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Transfer"){
				header("Location: /SDN-Website/transfer.php");
			}
			include "Views/Partials/bankButtons.php";
		}
		mysqli_close($con);

		?>
	</body>

</html>
