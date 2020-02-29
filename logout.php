<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>


		<title>Logout</title>
		<?php //include("Views\Partials/header.php");?>
	</head>
	<?php
		session_unset();
		session_destroy();
		header("Location: login.php");
		//echo "LOGGED OUT";
	?>

</html>