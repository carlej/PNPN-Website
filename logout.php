<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>


		<title>Volunteering</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<?php
		session_unset();
		session_destroy();
		header("Location: /PNPN-Website/login.php");
		//echo "LOGGED OUT";
	?>
	<body>This</body>

</html>