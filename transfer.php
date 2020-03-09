<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else
			echo "Please login to view this page.";
		?>
		

		<title>Bank</title>
		<?php include("Views/Partials/header.php");?>
	</head>
	<body>
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			include 'Javascript/Connections/convar.php';
			$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
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
			$name=NULL;
			if ($row[5]!=NULL) {
				$name=$row[5];
			}
			else{
				$name=$row[3].' '.$row[4];
			}
			if ($row[7]!=NULL) {
				//Note right now it is only allowed that each user can only access one ship it is a work in progress to add access to multiple
				$queryShip="SELECT * FROM ship WHERE ID = '$row[7]'";
				$resultShip= mysqli_query($con,$queryShip);
				$rowShip=mysqli_fetch_row($resultShip);
				$shipName=$rowShip[1];
				$parsed_ship_json=json_decode($rowShip[4],true);
				$parsed_ship_json=$parsed_ship_json['id'];
			}
			if ($row[6]!=NULL){
				$queryFleet="SELECT * FROM fleet WHERE ID = '$row[6]'";
				$resultFleet= mysqli_query($con,$queryFleet);
				$rowFleet=mysqli_fetch_row($resultFleet);
				$fleetName=$rowFleet[1];
				$parsed_fleet_json=json_decode($rowFleet[4],true);
				$parsed_fleet_json=$parsed_fleet_json['id'];
			}
			include "Views/Partials/showAccs.php";
			mysqli_close($con);
			include("Javascript/transcript.php");
		} 
		?>
	</body>

</html>