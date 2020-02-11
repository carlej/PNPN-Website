<?php //this file is for the landgrant game. At finish it will allow you to click on the space you want and lay clame to it right then and there as well as allow bidding and such these functions are all a work in progress and have almost zero progress or work at this point?>

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

		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b"): ?>
			<a href="/PNPN-Website/landgrant.php" class="PersonalPressed">Personal</a>

			<?php if ($url=="/PNPN-Website/landgrant.php"):?>
					<a href="/PNPN-Website/landsteward.php" class="LandButton">Land Steward</a>
			<?php endif;?>
		<?php endif;?>


	</head>
	<body>
		
	</body>

</html>
