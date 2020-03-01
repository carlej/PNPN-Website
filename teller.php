<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b" || $_SESSION['perm']=="z")) {
			$usename = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: bank.php");
		}
		//echo $_SESSION['stype'];
		//echo $_SESSION["hold"];
		//echo $_SESSION['nstype'];
		//echo $_SESSION["nest"];
		//echo $_SESSION['multsearch'][0][1];
		if ($_SESSION['clear']!=$_SERVER['PHP_SELF']) {
			include "Javascript/clear.php";
		}
		//echo $_SESSION['clear'];
		$_SESSION['clear']=$_SERVER['PHP_SELF'];
		//echo $_SESSION['clear'];
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Bank</title>
		<?php include("Views/Partials/header.php");?>
		
		
		<div class = "container-flow" id = "SwitchButtons">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col-6" style="padding-right: 0.05em;">
						<a href="bank.php" class="PersonalButton">Personal</a>
					</div>
					<div class = "col-6" style = "padding-left: 0.05em;">
						<a href="teller.php" class="TellerPressed">Teller</a>
					</div>
				</div>
			</div>
			</div>
		</div>

	<!-- Code for the teller and personal buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenu">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-sm-6">
						<a href="bank.php" class="PersonalButton2">Personal</a>
				</div>
				<div class = "col-sm-6">
					<a href="teller.php" class="TellerPressed2">Teller</a>
				</div>
				</div>
			</div>
			</div>
		</div>

	</head>
	<body class = "TellerAccounts">
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			include 'Javascript/Connections/convar.php';
			$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		}
		mysqli_close($con);
		//creates the basic inputs for the search file to find an user/account?>
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div calss = "col-2">
							<select name="type" style="margin-left: 1em; margin-bottom: 0.5em">
								<option>Search By:</option>
								<option value="Pname">Pirate Name</option>
								<option value="Fname">First Name</option>
								<option value="Lname">Last Name</option>
								<option value="Username">Email</option>
								<option value="shipID" style="display:none;">shipID</option>
								<option value="Ship" style="display:none;">Ship/House</option>
								<option value="fleetID" style="display:none;">fleetID</option>
								<option value="Fleet" style="display:none;">Fleet/Alliance</option>
							</select>
						</div>
						<div class = "col" style="margin-bottom: 0.5em; font-family: ariel">
							<input type="search" class="required" name="input" id= "SearchBox">
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Search" class="submit">
							<input type="hidden" name="new" value="new" class="submit">
						</div>
					</div>
				</div>
			</fieldset>
		</form>

		<?php 
		error_reporting(E_ERROR);
		if ($_POST['new']) {
			include "Javascript/clear.php";
		}
		if ($_SESSION['hold']!="hold") {
			$_SERVER["REQUEST_METHOD"] = "POST";
			$_POST['submit'] = "Search";
			$_POST['type']=$_SESSION['stype'];//"Username";
			$_POST['input']=$_SESSION['hold'];
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") { 
			//$string = htmlentities($_POST['input'], null, 'utf-8');
			$cat = substr_count($_POST['input'], ' ');
			echo $cat;
			include "Javascript/search.php";
			if($_POST['ntype']){
				include "Javascript/telltransearch.php";
			}
			//echo $_POST['input'];
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Ship/Household") {
		//header("Location: addShip.php");
			include("addShip.php");
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Fleet/Alliance") {
		header("Location: addFleet.php");
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['submit'] == "Cancel" || $_POST['submit'] == "Clear")){
			include('clear.php');
			?><script type="text/javascript">window.location.href='teller.php'</script><?php
			//$_SESSION['nest']="nest";
			//$_SESSION['temp']="temp";
			//echo '<script type="text/javascript">window.location.href="teller.php"</script>';
		}
		

		?>
	</body>

</html>