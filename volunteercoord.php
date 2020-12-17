<!doctype html>
<html>
	<head>
		<?php
		include("Javascript/Connections/req.php"); 
		if ($_SESSION['perm']!="c" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		} 
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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

		<!-- Creates the Personal, Coordinator, and Charter Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsFour">
			<div class="d-none d-xl-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonFourUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonFourUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MiddleButtonFourPressed">Coordinator</a>
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
				<div class = "row" id ="ButtonsRow" style="margin-right: -22.25em; margin-bottom: -1.90em">
				<div class = "col" style="padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonTopTwoUn">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="RightButtonTopTwoUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		<div class = "container-flow" id = "SwitchButtonsTwoLayered">
			<div class="d-none d-lg-block d-xl-none">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow" style="margin-right: -24em; margin-top: -4em">
				<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="LeftButtonBottomTwoPressed">Coordinator</a>
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
						<a href="volunteerTortuga.php" class="MenuButtonUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MenuButtonPressed">Coordinator</a>
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
		
		
	</head>
	<body>
		<form method="POST">
			<fieldset>
				<!-- Creates Port Nassau/Tortuga Selection  -->
				<div class = "container-flow" id = "SwitchButtonsTwoLayered">
					<div class="d-none d-xl-block">
					<div class = "d-flex justify-content-center">
						<div class = "row" id ="ButtonsRow" style="margin-right: -20em; margin-top: -3em">
						<div class = "col" style="padding-right: 0.05em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Port Nassau") { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Tortuga Nights") { ?>
									<input type="submit" name= "submit" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
							<?php } ?>
						</div>
						</div>
					</div>
					</div>
				</div>
				
				<!-- Creates Port Nassau/Tortuga Selection-->
				<div class = "container-flow" id = "SwitchButtonsTwoLayered">
					<div class="d-none d-lg-block d-xl-none">
					<div class = "d-flex justify-content-center">
						<div class = "row" id ="ButtonsRow" style="margin-right: -22em; margin-top: 2em">
						<div class = "col" style="padding-right: 0.05em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Port Nassau") { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Tortuga Nights") { ?>
									<input type="submit" name= "submit" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
							<?php } ?>
						</div>
						</div>
					</div>
					</div>
				</div>

				<!-- Creates Port Nassau/Tortuga Selection-->
				<div class = "container-flow" id = "SwitchButtonsTwoLayered">
					<div class="d-lg-none">
					<div class = "d-flex justify-content-center">
						<div class = "row" id ="ButtonsRow" style="margin-right: -40em; margin-top: -4em">
						<div class = "col" style="padding-right: 0.05em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Port Nassau") { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['submit'] == "Tortuga Nights") { ?>
									<input type="submit" name= "submit" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "submit" class="RightButtonTwoUn" value="Tortuga Nights"></input>
							<?php } ?>
						</div>
						</div>
					</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Port Nassau") { ?>
				<!--Creates the tabs for all of the Port Nassau volunteering departments-->
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-xl-block">
								<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up">
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Medic"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Volunteer Check-In" style="white-space: normal;"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Scuttlebutt"></input>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Gold Key"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Hearld"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Lost Cove"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Monkey Island" style="white-space: normal;"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<!--Creates the tabs for all of the Port Nassau volunteering departments for a smaller screen-->
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-lg-block d-xl-none">
								<div class = "d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up">
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Medic"></input>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id="DeptRowTwo">
										
										<div class = "col" style = "padding-right: 0.05em">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Volunteer Check-In" style="white-space: normal;"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Scuttlebutt"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gold Key"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Hearld"></input>
										</div>
									</div>
								</div>
								<div class = "d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style = "padding-right: 0.05em; margin-top: 0.1em">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Bank"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Lost Cove"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Monkey Island" style="white-space: normal;"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<!--Creates the tabs for all of the Port Nassau volunteering departments for the smallest screen-->
			<?php }
		} ?>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Tortuga Nights") { ?>
				<!--Creates the tabs for all of the volunteering departments-->
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-xl-block">
								<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDeptUn" value="Set-Up">
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Medic"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<input type="submit" name= "submit" class="RightButtonTop2VolunteerDeptUn" value="Scuttlebutt"></input>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Gold Key"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Hearld"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-lg-block d-xl-none">
								<div class = "d-flex justify-content-center" style="margin-left: -20.8em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up">
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Constab"></input>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -19.9em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Medic"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Scuttlebutt"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gold Key"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Sanitation"></input>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em">
											<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Hearld"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
		} ?>



		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Add Shifts") {
				include("Javascript/addshift.php");
			}
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
									<input type="hidden" name= "add">
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<?php
				if ($_POST['job']=="Prereg") {
					if (!$_POST['add']) {
						?>
						<form method="POST">
							<fieldset>
								<input type="submit" name="add" value="Add">
								<input type="hidden" name= "job" value="Prereg" >
								<input type="hidden" name="submit" value="Gate">
							</fieldset>
						</form>
						<input type="hidden" name="ID" value="'.$key.'">
						<?php
						$queryJob = "SELECT * FROM jobs WHERE job LIKE 'prereg' ";
						$resultJob= mysqli_query($con,$queryJob);
						if ($resultJob) {
							if (mysqli_num_rows($resultJob)>0) {
								$array = $resultJob->fetch_all(MYSQLI_NUM);
								foreach ($array as $key => $value) {
									echo '<form method="POST"><fieldset><p><li>pay '.$value[2].'</li>';
									echo '<li>start '.$value[3].'</li>';
									echo '<li>end '.$value[4].'</li>';
									echo '<li>total hours '.$value[5].'<input type="hidden" name="ID" value="'.$key.'"><input type="submit" name= "submit" value="Delete" ><input type="submit" name= "submit" value="Edit" ></li></p></fieldset></form>';
								}
							}
							else
								echo mysqli_fetch_row($resultJob);
						}
					}
					else{?>
						<label style="margin-bottom: 0em;">Adding a new Prereg Shift</label>
						<form method="POST">
							<fieldset>
								<li>
									<label style="margin-bottom: 0em;">Start Date: </label>
									<input type="date" name="start">
								</li>
								<li>
									<label style="margin-bottom: 0em;">End Date: </label>
									<input type="date" name="end">
								</li>
								<li>
									<label style="margin-bottom: 0em;">Start Time: </label>
									<input type="time" name="stime">
								</li>
								<li>
									<label style="margin-bottom: 0em;">End Time: </label>
									<input type="time" name="etime">
								</li>
								<li>
									<label style="margin-bottom: 0em;">Shift Length: </label>
									<input type="num" name="length" min="1">
								</li>
								<li>
									<label style="margin-bottom: 0em;">Pay Per Hour: </label>
									<input type="num" name="pay" min="1">
								</li>
								<input type="submit" name= "submit" value="Add Shifts">
								<input type="hidden" name= "job" value="Prereg">
							</fieldset>
						</form><?php
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