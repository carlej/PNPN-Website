<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Volunteering</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body><?php
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		else{
			//$queryIn = "SELECT * FROM volunteering WHERE 1"
		}
		mysqli_close($con);

		?></body>

</html>
