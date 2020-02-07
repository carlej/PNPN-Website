<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Land Grants</title>
		<?php include("Views\Partials/header.php");?>

		<a href="/PNPN-Website/landsteward.php" class="LandPressed">Land Steward</a>
		<a href="/PNPN-Website/landgrant.php" class="PersonalButton">Personal</a>

	</head>
	<body>
		
	</body>

</html>