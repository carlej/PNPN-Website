<?php //This is the volunteer page this is the next step after the bank functions are finished. It is not known at this time what this will look like but the base functions are that it will display all the shifts, allow users to sign up for a shift, it will allow checkin and check out of shifts, and it will auto pay on completion of shift ?>

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

		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm']=="b"): ?>
			<a href="/PNPN-Website/volunteer.php" class="PersonalPressed">Personal</a>

			<?php if ($url=="/PNPN-Website/volunteer.php"):?>
					<a href="/PNPN-Website/volunteercord.php" class="CordButton">Coordinator</a>
			<?php endif;?>
		<?php endif;?>

	</head>
	<body>
		<?php
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		else{
			//$queryIn = "SELECT * FROM volunteering WHERE 1"
		}
		mysqli_close($con);

		?>
			
	</body>

</html>
