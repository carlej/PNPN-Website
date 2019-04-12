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
		?>
		<?php if ($username!=NULL): ?>
		<?php include "Views/Partials/showAccs.php" ?>
		<?php include("Javascript/transcript.php"); ?>
	<?php endif; ?>
	</body>

</html>