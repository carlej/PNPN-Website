<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		?>
		
		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Volunteering</title>
		<?php include("Views\Partials/header.php");?>

		<a href="/PNPN-Website/volunteercord.php" class="CordPressed">Coordinator</a>
		<a href="/PNPN-Website/volunteer.php" class="PersonalButton">Personal</a>
	</head>
	<body>
		
	</body>

</html>