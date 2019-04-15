<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
			$perm = $_SESSION['perm'];
			if ($perm=="b") {
				header("Location: /SDN-Website/teller.php");
			}
		}
		else{
			echo "Please login to view this page.";
			$username=NULL;
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
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];
			include "Views/Partials/showAccs.php";
			if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Add Account") {
				include "Javascript/makeacc.php";
			}
			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Transfer"){
				header("Location: /SDN-Website/transfer.php");
			}
			include "Views/Partials/bankButtons.php";
		} mysqli_close($con);

		?>
	</body>

</html>
