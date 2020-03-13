<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		if ($_SESSION['perm']!="b" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
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
		//echo $_POST['Accfrom'];
		if ($_SESSION['clear']!=$_SERVER['PHP_SELF']) {
			include "Javascript/clear.php";
		}
		//echo $_SESSION['clear'];
		$_SESSION['clear']=$_SERVER['PHP_SELF'];
		//echo $_SESSION['clear'];
		?>

		<title>Bank</title>
		<?php include("Views/Partials/header.php");?>
		
	<!-- Code for the teller and personal buttons-->		
		<div class = "container-flow" id = "SwitchButtonsTwo">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col-6" style="padding-right: 0.05em;">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
							<a href="bank.php" class="LeftButtonTwoUn">Personal</a>
						<?php endif;?>
					</div>
					<div class = "col-6" style = "padding-left: 0.05em;">
						<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
							<a href="teller.php" class="RightButtonTwoPressed">Teller</a>
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
						<a href="bank.php" class="MenuButtonUn">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col-sm-6">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b")): ?>
						<a href="teller.php" class="MenuButtonPressed">Teller</a>
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
								<a href="bank.php" class="LeftButtonThreeUn">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MiddleButtonThreePressed">Teller</a>
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
								<a href="bank.php" class="MenuButtonUn">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col-lg" style = "padding-left: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MenuButtonPressed">Teller</a>
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
	<body class = "TellerAccounts">
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			include 'Javascript/Connections/convar.php';
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		}


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
								<option value="Ship">Ship/House</option>
								<option value="fleetID" style="display:none;">fleetID</option>
								<option value="Fleet">Fleet/Alliance</option>
							</select>
						</div>
						<div class = "col" style="margin-bottom: 0.5em;">
							<input type="search" class="required" name="input" id= "SearchBox" minlength="3">
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
		mysqli_close($con);
		?>
	</body>

</html>
