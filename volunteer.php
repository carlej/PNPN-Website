<?php //This is the volunteer page this is the next step after the bank functions are finished. It is not known at this time what this will look like but the base functions are that it will display all the shifts, allow users to sign up for a shift, it will allow checkin and check out of shifts, and it will auto pay on completion of shift ?>

<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
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
		<?php include("Views\Partials/header.php");?>

		<!-- Creates the Personal, Coordinator, and Charter Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteer.php" class="LeftButtonThreePressed">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MiddleButtonThreeUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="RightButtonThreeUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteer.php" class="MenuButtonPressed">Personal</a>
					<?php endif;?>
				</div>
				<div class = "col-lg" style = "padding-left: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col-lg" style="padding-right: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="MenuButtonUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Creates the Personal and Charter Buttons for regular users-->
		<div class = "container-flow" id = "SwitchButtonsTwo">
			<div class="d-none d-lg-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteer.php" class="LeftButtonTwoPressed">Personal</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="charter.php" class="RightButtonTwoUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
			<div class = "d-flex justify-content-center">
				<div class = "row">
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteer.php" class="MenuButtonPressed">Personal</a>
					<?php endif;?>
				</div>
				<div class="col-lg" style="padding-right: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="charter.php" class="MenuButtonUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</head>
		
		
	</head>
	<body>

		<div class = "container-flow">
			<div class = "d-flex justify-content-center">
				<div class="row" id="ComingSoon">
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
				<div>Coming Soon!!</div>
				<?php endif;?>
			</div>
		</div>

	<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
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
					echo "Prereg";
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
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		mysqli_close($con);
		?>
	<?php endif;?>
	</body>

</html>
