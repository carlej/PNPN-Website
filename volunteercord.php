<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="d" || $_SESSION['perm']=="z")) {
			$usename = $_SESSION['username'];
		}
		else{
			echo "Please login to view this page.";
			header("Location: bank.php");
		}
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		else{
			//$queryIn = "SELECT * FROM volunteering WHERE 1"
		}
		?>

		<title>Volunteering</title>
		<?php include("Views/Partials/header.php");?>


		<!-- Creates the Personal, Coordinator, and Charter Buttons -->
		<div class = "container-flow" id = "SwitchButtonsVol">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
					<div class = "col" style="padding-right: 0.05em;">
						<a href="volunteer.php" class="PersonalButton3">Personal</a>
					</div>
					<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
						<a href="volunteercord.php" class="CordPressed3">Coordinator</a>
					</div>
					<div class = "col" style = "padding-left: 0.05em;">
						<a href="chartercord.php" class="CharterButton">Charter/Land Grant</a>
					</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuVol">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<a href="volunteer.php" class="PersonalButton2">Personal</a>
				</div>
				<div class = "col-lg" style = "padding-left: 0.05em;">
					<a href="volunteercord.php" class="CordPressed2">Coordinator</a>
				</div>
				<div class = "col-lg">
					<a href="chartercord.php" class="CharterButton2">Charter/Land Grant</a>
				</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</head>
	<body>
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div class = "col">
							<input type="submit" name= "submit" value="Gate" >
							<input type="submit" name= "submit" value="Parking" >
							<input type="submit" name= "submit" value="Constab" >
							<input type="hidden" name="job" value="null">
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Gate") {
				?>
				<form method="POST">
					<fieldset>
						<div class = "container" id="SearchBy">
							<div class = "d-flex-row">
								<div class = "col">
									<input type="submit" name= "job" value="Prereg" >
									<input type="submit" name= "job" value="cathurder" >
									<input type="submit" name= "job" value="other things" >
									<input type="hidden" name="submit" value="Gate">
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<?php
				if ($_POST['job']=="Prereg") {
					$queryJob = "SELECT * FROM jobs WHERE job LIKE 'prereg' ";
					$resultJob= mysqli_query($con,$queryJob);
					if ($resultJob) {
						if (mysqli_num_rows($resultJob)>1) {
							$array = $resultJob->fetch_all(MYSQLI_NUM);
							foreach ($array as $key => $value) {
								echo '<p><li>pay '.$value[1].'</li>';
								echo '<li>start '.$value[2].'</li>';
								echo '<li>end '.$value[3].'</li>';
								echo '<li>total hours '.$value[4].'</li></p>';
							}
						}
						else
							echo mysqli_fetch_row($resultJob);
					}
				}
				else if ($_POST['job']=="cathurder") {
					echo "catzz";
				}
				else if ($_POST['job']=="other things") {
					echo "idk what jobs there is";
				}
			}
			else if ($_POST['submit'] == "Parking") {
				?>
				<form method="POST">
					<fieldset>
						<div class = "container" id="SearchBy">
							<div class = "d-flex-row">
								<div class = "col">
									<input type="submit" name= "job" value="Outer lot" >
									<input type="submit" name= "job" value="Inner lot" >
									<input type="submit" name= "job" value="other things" >
									<input type="hidden" name="submit" value="Parking">
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<?php
				if ($_POST['job']=="Outer lot") {
					echo "outer";
				}
				else if ($_POST['job']=="Inner lot") {
					echo "inner";
				}
				else if ($_POST['job']=="other things") {
					echo "idk what jobs there is";
				}
			}
			else if ($_POST['submit'] == "Constab") {
				?>
				<form method="POST">
					<fieldset>
						<div class = "container" id="SearchBy">
							<div class = "d-flex-row">
								<div class = "col">
									<input type="submit" name= "job" value="Roming" >
									<input type="submit" name= "job" value="Not roming" >
									<input type="submit" name= "job" value="Much stabbs" >
									<input type="hidden" name="submit" value="Constab">
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<?php
				if ($_POST['job']=="Roming") {
					echo "walkzz";
				}
				else if ($_POST['job']=="Not roming") {
					echo "stations";
				}
				else if ($_POST['job']=="Much stabbs") {
					echo "knife";
				}
			}
		}
		//$time = 1;
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		mysqli_close($con);
		?>
		
	</body>

</html>