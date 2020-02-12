<!doctype html>
<html>
	<head>
		<?php 
		include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			//echo "Welcome " . $_SESSION['username'];
			$Username = $_SESSION['username'];
		} //This is jus the blank base page
		?>


		<title>Home</title>
		<?php 
		include("Views/Partials/header.php");
		//echo $_SERVER['HTTP_HOST'];
		//echo $_SERVER['PHP_SELF'];
		header("Location: /PNPN-Website/bank.php");?>

		
	</head>

</html>
