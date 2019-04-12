<!doctype html>
<html>
	<head>
		<?php include("Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			echo "Welcome " . $_SESSION['username'];
			$username = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			$username=NULL;
		}
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
		$parsed_json = json_decode($row[0], true);
		$parsed_json = $parsed_json['id'];

//		foreach($parsed_json as $value)
//		{
//			$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
//			$result = mysqli_query($con, $accountQuery);
//			$row2=mysqli_fetch_row($result);
//			//echo $value . "\r\n";		//$value displays that account number of the account
//   			//echo $row2[0] . "\r\n";	//$row2[0] displayes the ballance of the account
//		}
		?>
		<?php if ($username!=NULL): ?>
		<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<li><a><?php echo $value; ?></a></li>
						<li><a><?php
						$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
						$result = mysqli_query($con, $accountQuery);
						$row2=mysqli_fetch_row($result);
						echo $row2[0]; ?></a></li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
		<?php endforeach; ?>
		<?php include("Javascript/bankscript.php"); ?>
	<?php endif; ?>
	</body>

</html>
