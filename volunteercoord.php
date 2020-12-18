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
				<input type="hidden" name="submit" value="NULL">
				<!-- Creates Port Nassau/Tortuga Selection  -->
				<div class = "container-flow" id = "SwitchButtonsTwoLayered">
					<div class="d-none d-xl-block">
					<div class = "d-flex justify-content-center">
						<div class = "row" id ="ButtonsRow" style="margin-right: -20em; margin-top: -3em">
						<div class = "col" style="padding-right: 0.05em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['event'] == "Port Nassau") { ?>
									<input type="submit" name= "event" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['event'] == "Tortuga Nights") { ?>
									<input type="submit" name= "event" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
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
								if ($_POST['event'] == "Port Nassau") { ?>
									<input type="submit" name= "event" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['event'] == "Tortuga Nights") { ?>
									<input type="submit" name= "event" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
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
								if ($_POST['event'] == "Port Nassau") { ?>
									<input type="submit" name= "event" class="LeftButtonTwoPressed" value="Port Nassau"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="LeftButtonTwoUn" value="Port Nassau"></input>
							<?php } ?>
						</div>
						<div class = "col" style="padding-left: 0.05em; padding-right: 0.0em">
							<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
								if ($_POST['event'] == "Tortuga Nights") { ?>
									<input type="submit" name= "event" class="RightButtonTwoPressed" value="Tortuga Nights"></input>
								<?php }
								else { ?>
									<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
								<?php }
							}
							else{ ?>
								<input type="submit" name= "event" class="RightButtonTwoUn" value="Tortuga Nights"></input>
							<?php } ?>
						</div>
						</div>
					</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['event'] == "Port Nassau") { ?>
				<!--Creates the tabs for all of the Port Nassau volunteering departments-->
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="job" value="NULL">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-xl-block">
								<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Set-Up") { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptPressed" value="Set-Up"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Gate") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gate"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Parking") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Parking"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Constab") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Constab"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Medic") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Medic"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Medic"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Volunteer Check-In") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Volunteer Check-In" style="white-space: normal;"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Volunteer Check-In" style="white-space: normal;"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptPressed" value="Scuttlebutt"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Scuttlebutt"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Gold Key") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Gold Key"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Gold Key"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Sanitation") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Sanitation"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Hearld") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Hearld"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Hearld"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Bank") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Bank"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Lost Cove") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Lost Cove"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Lost Cove"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Monkey Island") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Monkey Island" style="white-space: normal;"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Monkey Island" style="white-space: normal;"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<?php if ($_POST['submit'] == "Tear Down") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Tear Down"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
											<?php } ?>
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
						<input type="hidden" name="job" value="NULL">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-lg-block d-xl-none">
								<div class = "d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Set-Up") { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptPressed" value="Set-Up"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Gate") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gate"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Parking") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Parking"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Constab") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Constab"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Medic") { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptPressed" value="Medic"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Medic"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id="DeptRowTwo">
										
										<div class = "col" style = "padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Volunteer Check-In") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Volunteer Check-In" style="white-space: normal;"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Volunteer Check-In" style="white-space: normal;"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Scuttlebutt"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Scuttlebutt"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Gold Key") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gold Key"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gold Key"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Sanitation") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Sanitation"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Hearld") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Hearld"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Hearld"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class = "d-flex justify-content-center" style="margin-left: -19.0em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style = "padding-right: 0.05em; margin-top: 0.1em">
											<?php if ($_POST['submit'] == "Bank") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Bank"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Bank"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<?php if ($_POST['submit'] == "Lost Cove") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Lost Cove"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Lost Cove"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<?php if ($_POST['submit'] == "Monkey Island") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Monkey Island" style="white-space: normal;"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Monkey Island" style="white-space: normal;"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.1em">
											<?php if ($_POST['submit'] == "Tear Down") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Tear Down"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
											<?php } ?>
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
			if ($_POST['event'] == "Tortuga Nights") { ?>
				<!--Creates the tabs for all of the volunteering departments-->
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="job" value="NULL">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-xl-block">
								<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Set-Up") { ?>
												<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDeptPressed" value="Set-Up"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDeptUn" value="Set-Up"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Gate") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gate"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Parking") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Parking"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Constab") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Constab"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Constab"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Medic") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Medic"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Medic"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
												<input type="submit" name= "submit" class="RightButtonTop2VolunteerDeptPressed" value="Scuttlebutt"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonTop2VolunteerDeptUn" value="Scuttlebutt"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Gold Key") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Gold Key"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Gold Key"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Sanitation") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Sanitation"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Sanitation"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Hearld") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Hearld"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Hearld"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Bank") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Bank"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<?php if ($_POST['submit'] == "Tear Down") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Tear Down"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
											<?php } ?>
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
						<input type="hidden" name="job" value="NULL">
						<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -5em;">
							<div class = "d-none d-lg-block d-xl-none">
								<div class = "d-flex justify-content-center" style="margin-left: -20.8em;">
									<div class = "row" id = "DeptRowOne">
										<div class = "col" style="padding-right: 0.05em;">
											<?php if ($_POST['submit'] == "Set-Up") { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptPressed" value="Set-Up"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonTopVolunteerDeptUn" value="Set-Up"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Gate") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gate"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gate"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Parking") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Parking"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Parking"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Constab") { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptPressed" value="Constab"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonTopVolunteerDeptUn" value="Constab"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -19.9em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Medic") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Medic"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Medic"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Scuttlebutt"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Scuttlebutt"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Gold Key") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Gold Key"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Gold Key"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em">
											<?php if ($_POST['submit'] == "Sanitation") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Sanitation"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Sanitation"></input>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style = "padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Hearld") { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptPressed" value="Hearld"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDeptUn" value="Hearld"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
											<?php if ($_POST['submit'] == "Bank") { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptPressed" value="Bank"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="MiddleButtonVolunteerDeptUn" value="Bank"></input>
											<?php } ?>
										</div>
										<div class = "col" style = "padding-left: 0.05em;">
											<?php if ($_POST['submit'] == "Tear Down") { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptPressed" value="Tear Down"></input>
											<?php }
											else { ?>
												<input type="submit" name= "submit" class="RightButtonBottomVolunteerDeptUn" value="Tear Down"></input>
											<?php } ?>
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
			if ($_POST['submit'] == "Set-Up") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Set-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Gate") {
				?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Gate">
						<!-- Buttons for all gate go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Parking") {
				?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Parking">
						<!-- Buttons for all Parking go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Constab") {
				?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Constab">
						<!-- Buttons for all Constab go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Medic") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Medic">
						<!-- Buttons for all Medic go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Volunteer Check-In") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Volunteer Check-In">
						<!-- Buttons for all Volunteer Check-In go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Scuttlebutt") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Scuttlebutt">
						<!-- Buttons for all Scuttlebutt go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Gold Key") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Gold Key">
						<!-- Buttons for all Gold Key go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Sanitation") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Sanitation">
						<!-- Buttons for all Sanitation go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Hearld") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Hearld">
						<!-- Buttons for all Hearld go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Bank") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Bank">
						<!-- Buttons for all Bank go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Lost Cove") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Lost Cove">
						<!-- Buttons for all Lost Cove go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Monkey Island") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Monkey Island">
						<!-- Buttons for all Monkey Island go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Tear Down") { ?>
				<form method="POST">
					<fieldset>
						<?php 
						$delim = $_POST['event'];
						echo '<input type="hidden" name="event" value="'.$delim.'">';?>
						<input type="hidden" name="submit" value="Tear Down">
						<!-- Buttons for all Tear Down go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<input type="submit" name="job" value="job">
					</fieldset>
				</form>
			<?php }
		}
		//$time = 1;
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		mysqli_close($con);
		?>
		
	</body>

</html>