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
		<?php include("Views/Partials/header.php");?>

		<!-- Creates the Personal, Coordinator, and Charter Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsFour">
			<div class="d-none d-xl-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonFourUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonFourPressed">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MiddleButtonFourUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="RightButtonFourUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Creates the Personal, Coordinator, and Charter Buttons with the page shrunk-->
		<div class = "container-flow" id = "SwitchButtonsTwoLayered">
			<div class="d-none d-lg-block d-xl-none">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow" style="margin-right: -20.1em">
				<div class = "col" style="padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonTopTwoUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="RightButtonTopTwoPressed">Tortuga Nights</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		<div class = "container-flow" id = "SwitchButtonsTwoLayered">
			<div class="d-none d-lg-block d-xl-none">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow" style="margin-right: -22em; margin-top: -5.9em">
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="LeftButtonBottomTwoUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="RightButtonBottomTwoUn">Charter/Land Grant</a>
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
						<a href="volunteerNassau.php" class="MenuButtonUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MenuButtonPressed">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="MenuButtonUn">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>

		<!-- Creates the Personal and Charter Buttons for regular users-->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-xl-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em;">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonThreeUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-right: 0.05em; padding-left: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonThreePressed">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class="col" style="padding-left: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="charter.php" class="RightButtonThreeUn">Charter/Land Grants</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-xl-none">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerNassau.php" class="MenuButtonUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerTortuga.php" class="MenuButtonPressed">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class="col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="charter.php" class="MenuButtonUn">Charter/Land Grants</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</head>
		
		

	<body>
		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
		<!--Creates the tabs for all of the volunteering departments-->
		<form method="POST">
			<fieldset>
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
					<div class = "d-none d-xl-block">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept" value="Set-Up">
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Gate"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Parking"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Constab"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Medic"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept" value="Scuttlebutt"></input>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								<div class = "col" style = "padding-right: 0.05em;">
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept" value="Gold Key"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Sanitation"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Hearld"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Bank"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept" value="Tear Down"></input>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<form method="POST">
			<fieldset>
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -7em;">
					<div class = "d-none d-lg-block d-xl-none">
						<div class = "d-flex justify-content-center" style="margin-left: -20.8em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept" value="Set-Up">
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Gate"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Parking"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="RightButtonTopVolunteerDept" value="Constab"></input>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -19.9em;">
							<div class = "row" id="DeptRowTwo">
								<div class = "col" style = "padding-right: 0.05em">
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept" value="Medic"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Scuttlebutt"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Gold Key"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em">
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept" value="Sanitation"></input>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								<div class = "col" style = "padding-right: 0.05em">
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept" value="Hearld"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept" value="Bank"></input>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept" value="Tear Down"></input>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php endif; ?>
	</body>

</html>


