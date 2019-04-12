<!doctype html>
<html>
	<head>
		<?php 
		include("Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$Username = $_SESSION['username'];
			$perm = $_SESSION['perm'];
			if ($perm=="b") {
				header("Location: /SDN-Website/teller.php");
			}
		}
		?>


		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Home</title>
		<?php 
		include("Views\Partials/header.php");?>
	</head>

</html>