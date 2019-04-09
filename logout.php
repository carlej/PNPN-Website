<!doctype html>
<html>
	<head>
		<?php include("Connections/req.php"); ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Volunteering</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<?php
		$_SESSION['loggenin'] = false;
		$_SESSION['username'] = NULL;
		session_destroy();
		header("Location: /SDN-Website");
		echo "LOGGED OUT";
	?>
	<body>This</body>

</html>