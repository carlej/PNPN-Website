<!doctype html>
<html>
	<head>
		<?php include("Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else
			echo "Please login to view this page.";//<script type="text/javascript" src="Javascript/bankscript.js"></script>
		?>
		

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>
		<?php
		include 'Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
		$resultIn = mysqli_query($con, $queryIn);
		$row=mysqli_fetch_row($resultIn);
		//$json_string = file_get_contents($row[0]);
		$parsed_json = json_decode($row[0], true);
		$parsed_json = $parsed_json['id'];
		foreach($parsed_json as $value)
		{
			$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
			$result = mysqli_query($con, $accountQuery);
			$row2=mysqli_fetch_row($result);
			echo $value . "\r\n";
   			echo $row2[0] . "\r\n";
		}
		?>
		<?php include("Javascript/bankscript.php"); ?>
	</body>

</html>
