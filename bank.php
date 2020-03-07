<?php //This displays the bank that a normal user will see when they click on bank?>

<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		else{
			header ("location:login.php");
			echo "Please login to view this page.";
		}
		if ($_SESSION['clear']!=$_SERVER['PHP_SELF']) {
			include "Javascript/clear.php";
		}
		$_SESSION['clear']=$_SERVER['PHP_SELF'];

		?>

		<title>Bank</title>
		<?php include("Views/Partials/header.php");?>
		
		
		<!-- Creates the Personal and Teller Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsTwo">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col-6" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
						<a href="bank.php" class="LeftButtonTwoPressed" onclick="Cancel()">Personal</a>
						
					<?php endif;?>
				</div>
				<div class = "col-6" style = "padding-left: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
					<a href="teller.php" class="RightButtonTwoUn" onclick="Cancel()">Teller</a>
					
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		
		<!-- Code for the teller and personal buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-sm-6">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
						<a href="bank.php" class="MenuButtonPressed" onclick="Cancel()">Personal</a>
						
					<?php endif;?>
				</div>
				<div class = "col-sm-6">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
					<a href="teller.php" class="MenuButtonUn" onclick="Cancel()">Teller</a>
					
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Creates the Personal, Teller, and Head Banker Buttons -->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
				<div class = "d-flex justify-content-center">
					<div class = "row" id ="ButtonsRow">
						<div class = "col" style="padding-right: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="bank.php" class="LeftButtonThreePressed">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MiddleButtonThreeUn">Teller</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="headbanker.php" class="RightButtonThreeUn">Head Banker</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Code for the Personal, Teller, and Head Banker Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
				<div class = "d-flex justify-content-center">
					<div class = "row">
						<div class = "col-lg">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="bank.php" class="MenuButtonPressed">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col-lg" style = "padding-left: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MenuButtonUn">Teller</a>
							<?php endif;?>
						</div>
						<div class = "col-lg">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="headbanker.php" class="MenuButtonUn">Head Banker</a>
							<?php endif;?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</head>
	
	
	<body class = "bankphp">
		<?php
		include 'Javascript/Connections/convar.php';
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];
			$parsed_ship_json=NULL;
			$parsed_fleet_json=NULL;
			$queryIn = "SELECT * FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			if ($row[7]!=NULL) { //This pulls up any accounts they may have access to that are from a ship
				//Note right now it is only allowed that each user can only access one ship it is a work in progress to add access to multiple
				$queryShip="SELECT * FROM ship WHERE ID = '$row[7]'";
				$resultShip= mysqli_query($con,$queryShip);
				$rowShip=mysqli_fetch_row($resultShip);
				$shipName=$rowShip[1];
				$parsed_ship_json=json_decode($rowShip[4],true);
				$parsed_ship_json=$parsed_ship_json['id'];
			}
			if ($row[6]!=NULL){ //This pulls up any accounts they may have access to that are from a fleet
				$queryFleet="SELECT * FROM fleet WHERE ID = '$row[6]'";
				$resultFleet= mysqli_query($con,$queryFleet);
				$rowFleet=mysqli_fetch_row($resultFleet);
				$fleetName=$rowFleet[1];
				$parsed_fleet_json=json_decode($rowFleet[4],true);
				$parsed_fleet_json=$parsed_fleet_json['id'];
			}
			$name=NULL;
			if ($row[5]!=NULL) {
				$name=$row[5];
			}
			else{
				$name=$row[3].' '.$row[4];
			}
			
			include "Views/Partials/showAccs.php";//This desplays the accounts that the user has access to.

			include "Views/Partials/showhist.php"; //Right now all history for all accounts is displayed here this is a work in progress to make it only display one at a time and only when asked

			//if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Transfer"){
			//	header("Location: transfer.php");
			//}
			//include "Views/Partials/bankButtons.php"; //Its just a button
			include "Javascript/transcript.php";
		}
		mysqli_close($con);

		?>


	</body>

</html>

<script type="text/javascript">
	function Cancel(){
		load('Javascript/clear.php');
		window.location.href='bank.php';
	}
</script>