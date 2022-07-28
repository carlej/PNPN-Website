<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		if ($_SESSION['perm']!="b" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="b" || $_SESSION['perm']=="z")) {
			$usename = $_SESSION['username'];
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			if ($_SESSION['perm'] != 'z') {
				date_default_timezone_set('America/Los_Angeles');
				$jobperm = "SELECT * FROM jobs WHERE checkO = 0 AND user = '$usename' AND job ='Teller' ORDER BY start ASC";
				$ackjob = mysqli_query($con, $jobperm);
				$jobd = mysqli_fetch_row($ackjob);
				$start = new DateTime($jobd[4]);
				$start -> modify('-15 minutes');
				$now = new DateTime("now");
				$end = new DateTime($jobd[5]);
				$end -> modify('+15 minutes');
				if ($now > $end || mysqli_num_rows($ackjob) == 0){ ?>
					<script type="text/javascript">window.location.href="bank.php"</script> <?php
				}
			}
		}
		else{
			echo "Please login to view this page.";
			header("Location: bank.php");
		}
		if ($_SESSION['clear']!=$_SERVER['PHP_SELF']) {
			include "Javascript/clear.php";
		}
		$_SESSION['clear']=$_SERVER['PHP_SELF'];
		?>

		<title>OMEGA</title>
		<?php include("Views/Partials/header.php");?>
	
	</head>
	<body class = "TellerAccounts">
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			//include 'Javascript/Connections/convar.php';
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
							<div><label>Edit Account:</label></div>
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
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$input = $_POST['input'];
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			} 
			if ($_POST['type'] == 'Ship') {
				$query = "SELECT * FROM ship WHERE Name LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
			else if ($_POST['type'] == 'Fleet') {
				$query = "SELECT * FROM fleet WHERE Name LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
			else if ($_POST['type'] == 'Username') {
				$query = "SELECT * FROM users WHERE Username LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
			else if ($_POST['type'] == 'Lname') {
				$query = "SELECT * FROM users WHERE Fname LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
			else if ($_POST['type'] == 'Fname') {
				$query = "SELECT * FROM users WHERE Lname LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
			else if ($_POST['type'] == 'Pname') {
				$query = "SELECT * FROM users WHERE Pname LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result);
			}
		}
			//echo $_POST['input'];
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Ship/Household") {
			include("addShip.php");
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Add Fleet/Alliance") {
		header("Location: addFleet.php");
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['submit'] == "Cancel" || $_POST['submit'] == "Clear")){
			include('clear.php');
			?><script type="text/javascript">window.location.href='teller.php'</script><?php
		}
		mysqli_close($con);
		?>
	</body>

</html>
