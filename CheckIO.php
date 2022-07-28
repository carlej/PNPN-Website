<!doctype html>
<html>
	<head>
		<?php
		include("Javascript/Connections/req.php"); 
		if ($_SESSION['username']!="CheckIO" && $_SESSION['perm']!="z") {
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
		?>

		<title>Check In Out</title>
		<?php  
$url=NULL;  
    $url= $_SERVER['REQUEST_URI'];
  ?>
<div class="container-flow">
	<div class="header"></div>
	<div class="d-none d-lg-block">
	<div id="cssmenu" class="align-center">
     		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm'] == 'b'): ?>
     		<?php endif; ?>

				<div class="compRose"><img src="CSS\styles\Compass_Rose_2.png" alt="Compass_Rose"></div>
		</ul>

	</div>
	</div>
	</div>

</div>
	</head>
	<body>
		<form method="POST">
			<fieldset>
				<input type="hidden" name="submit">
				<input type="hidden" name="job">
				<input type="hidden" name="Sign-Up">
				<!-- Creates Port Nassau/Tortuga Selection  -->
				<div class = "container-flow" id = "SwitchButtonsTwoLayered">
					<div class="d-none d-xl-block">
					<div class = "d-flex justify-content-center">
						<div class = "row" id ="ButtonsRow" style="margin-right: -20em;">
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
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
		<!--Creates the tabs for all of the Port Nassau volunteering departments-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="event" value="Port Nassau">
				<input type="hidden" name ="Sign-Up">
				<input type="hidden" name="job">
				<input type="hidden" name="submit">
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -3em;">
					<div class = "d-none d-xl-block">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Set-Up") { ?>
									<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept pressed" value="Set-Up"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept unpressed" value="Set-Up"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Gate") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Gate"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Parking") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Parking"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Saftey") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Saftey"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Fire") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Fire"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Fire"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Bank") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Bank" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
									<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept pressed" value="Scuttlebutt"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept unpressed" value="Scuttlebutt"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								<div class = "col" style = "padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Titles") { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept pressed" value="Titles"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Titles"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Sanitation") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Sanitation"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Hearld") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Hearld"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Hearld"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Lost Cove") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Lost Cove"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Lost Cove"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Monkey Island") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Monkey Island" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Monkey Island" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<?php if ($_POST['submit'] == "Tear Down") { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept pressed" value="Tear Down"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Tear Down"></input>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<!--Creates the tabs for all of the volunteering departments for a smaller screen-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="event" value="Port Nassau">
				<input type="hidden" name="job">
				<input type="hidden" name ="Sign-Up">
				<input type="hidden" name="submit">
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -3em;">
					<div class = "d-none d-lg-block d-xl-none">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Set-Up") { ?>
									<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept pressed" value="Set-Up"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept unpressed" value="Set-Up"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Gate") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Gate"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Parking") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Parking"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Saftey") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Saftey"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Fire") { ?>
									<input type="submit" name= "submit" class="RightButtonTopVolunteerDept pressed" value="Fire"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTopVolunteerDept unpressed" value="Fire"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								
								<div class = "col" style = "padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Bank") { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept pressed" value="Bank" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Scuttlebutt"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Scuttlebutt"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Titles") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Titles"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Titles"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Sanitation") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Sanitation"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Hearld") { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept pressed" value="Hearld"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Hearld"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 0.05em">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
									<?php if ($_POST['submit'] == "Lost Cove") { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept pressed" value="Lost Cove"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Lost Cove"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
									<?php if ($_POST['submit'] == "Monkey Island") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Monkey Island" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Monkey Island" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
									<?php if ($_POST['submit'] == "Tear Down") { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept pressed" value="Tear Down"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Tear Down"></input>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>

		<!--Creates the tabs for all of the volunteering departments for the smallest screen-->

		
		<div class = "container">
			<div class="d-lg-none">
				<div class = "d-flex justify-content-center">
					<div class = "row">
						<div class = "col">
							<div class="DepartmentDropDown">
								<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
									<button class="DeptDropDown"><?php echo $_POST['submit'] ?>:</button>
								<?php }
								else { ?>
									<button class="DeptDropDown">Select Department:</button>
								<?php } ?>
								<div class="DeptContent">
									<form method="POST">
										<fieldset>
											<input type="hidden" name="event" value="Port Nassau">
											<input type="hidden" name ="Sign-Up">
											<input type="hidden" name ="job">
											<input type="hidden" name="submit">
											<input type="submit" name="submit" value="Set-Up"></input>
											<input type="submit" name="submit" value="Gate"></input>
											<input type="submit" name="submit" value="Parking"></input>
											<input type="submit" name="submit" value="Saftey"></input>
											<input type="submit" name="submit" value="Fire"></input>
											<input type="submit" name="submit" value="Bank"></input>
											<input type="submit" name="submit" value="Scuttlebutt"></input>
											<input type="submit" name="submit" value="Titles"></input>
											<input type="submit" name="submit" value="Sanitation"></input>
											<input type="submit" name="submit" value="Hearld"></input>
											<input type="submit" name="submit" value="Lost Cove"></input>
											<input type="submit" name="submit" value="Monkey Island"></input>
											<input type="submit" name="submit" value="Tear Down"></input>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Creates Buttons inside of the other buttons-->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Set-Up") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Set-Up">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4em;" class= "alone pressed" name="job" value="Set Up">
									<?php $_POST['job'] = "Set Up"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4em;" class= "alone pressed" name="job" value="Set Up">
									<?php $_POST['job'] = "Set Up"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Gate") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Gate">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all gate go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Registration") { ?>
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob pressed" name="job" value="Registration">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob unpressed" name="job" value="Registration">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cat Herder") { ?>
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob pressed" name="job" value="Cat Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob unpressed" name="job" value="Cat Herder">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Dragon Herder") { ?>
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob pressed" name="job" value="Dragon Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob unpressed" name="job" value="Dragon Herder">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Registration") { ?>
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob pressed" name="job" value="Registration">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob unpressed" name="job" value="Registration">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cat Herder") { ?>
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob pressed" name="job" value="Cat Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob unpressed" name="job" value="Cat Herder">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Dragon Herder") { ?>
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob pressed" name="job" value="Dragon Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob unpressed" name="job" value="Dragon Herder">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Parking") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Parking">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Parking go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowOne">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "General Parking") { ?>
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob pressed" name="job" value="General Parking">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob unpressed" name="job" value="General Parking">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Main Gate") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Main Gate">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Main Gate">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "MiddleButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "MiddleButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Lot") { ?>
											<input type="submit" style="width: 4.2em;" class= "MiddleButtonJob pressed" name="job" value="Front Lot">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.2em;" class= "MiddleButtonJob unpressed" name="job" value="Front Lot">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Line") { ?>
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob pressed" name="job" value="Front Line">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob unpressed" name="job" value="Front Line">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Overnight Watch") { ?>
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob pressed" name="job" value="Overnight Watch">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob unpressed" name="job" value="Overnight Watch">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "General Parking") { ?>
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob pressed" name="job" value="General Parking">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob unpressed" name="job" value="General Parking">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Main Gate") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Main Gate">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Main Gate">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "RightButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "RightButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<div  class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Lot") { ?>
											<input type="submit" style="width: 4.2em;" class= "LeftButtonJob pressed" name="job" value="Front Lot">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.2em;" class= "LeftButtonJob unpressed" name="job" value="Front Lot">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Line") { ?>
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob pressed" name="job" value="Front Line">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob unpressed" name="job" value="Front Line">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Overnight Watch") { ?>
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob pressed" name="job" value="Overnight Watch">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob unpressed" name="job" value="Overnight Watch">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Saftey") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Saftey">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Saftey go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Gate Sentry") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Gate Sentry">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Gate Sentry">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Station") { ?>
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob pressed" name="job" value="Station">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob unpressed" name="job" value="Station">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Gate Sentry") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Gate Sentry">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Gate Sentry">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Station") { ?>
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob pressed" name="job" value="Station">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob unpressed" name="job" value="Station">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Fire") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Fire">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Fire go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cigarette Butt Turn In") { ?>
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob pressed" name="job" value="Cigarette Butt Turn In">
										<?php }
										else { ?> 
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob unpressed" name="job" value="Cigarette Butt Turn In">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Butt Can Checks") { ?>
											<input type="submit" style="width: 7em;" class= "RightButtonJob pressed" name="job" value="Butt Can Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 7em;" class= "RightButtonJob unpressed" name="job" value="Butt Can Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cigarette Butt Turn In") { ?>
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob pressed" name="job" value="Cigarette Butt Turn In">
										<?php }
										else { ?> 
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob unpressed" name="job" value="Cigarette Butt Turn In">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Butt Can Checks") { ?>
											<input type="submit" style="width: 7em;" class= "RightButtonJob pressed" name="job" value="Butt Can Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 7em;" class= "RightButtonJob unpressed" name="job" value="Butt Can Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Bank") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Bank">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Teller">
									<?php $_POST['job'] = "Teller"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Teller">
									<?php $_POST['job'] = "Teller"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Scuttlebutt") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Scuttlebutt">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.4em;" class= "alone pressed" name="job" value="Skuttler">
									<?php $_POST['job'] = "Skuttler"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.4em;" class= "alone pressed" name="job" value="Skuttler">
									<?php $_POST['job'] = "Skuttler"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Titles") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Titles">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.4em;" class= "alone pressed" name="job" value="Titler">
									<?php $_POST['job'] = "Titler"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.4em;" class= "alone pressed" name="job" value="Titler">
									<?php $_POST['job'] = "Titler"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Sanitation") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Sanitation">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Fire go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Biffy Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob pressed" name="job" value="Biffy Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob unpressed" name="job" value="Biffy Checks">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Trash Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob pressed" name="job" value="Trash Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob unpressed" name="job" value="Trash Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Biffy Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob pressed" name="job" value="Biffy Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob unpressed" name="job" value="Biffy Checks">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Trash Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob pressed" name="job" value="Trash Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob unpressed" name="job" value="Trash Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Hearld") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Hearld">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Hearld">
									<?php $_POST['job'] = "Hearld"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Hearld">
									<?php $_POST['job'] = "Hearld"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Lost Cove") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Lost Cove">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Attendant">
									<?php $_POST['job'] = "Attendant"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Attendant">
									<?php $_POST['job'] = "Attendant"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Monkey Island") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Monkey Island">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Attendant">
									<?php $_POST['job'] = "Attendant"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Attendant">
									<?php $_POST['job'] = "Attendant"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Tear Down") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<input type="hidden" name="submit" value="Tear Down">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Tear Down">
									<?php $_POST['job'] = "Tear Down"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Tear Down">
									<?php $_POST['job'] = "Tear Down"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			//look up  shifts for job type and allow sign up
			if ($_POST['job'] != NULL) { 
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Port Nassau">
						<div class = "d-none d-lg-none d-xl-block">
							<div class="d-flex justify-content-left">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style="margin-left: 14em; margin-top: 2em;">
										<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 4em;">PAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;">DAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">START</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">END</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Check In</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.3em;">Check Out</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">Email</label>
										<br>
										<?php
										$input = $_POST['job']; 
										$sect = $_POST['submit']?>
										<input type="hidden" name="job" value="<?php echo $input ?>">
										<?php
										$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if (!$con) {
											die('Could not connect: ' . mysql_error());
										}
										$method = $_POST['submit'];
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input'";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											$count = 1;
											foreach ($array as $key => $value) { 
												$date = date_create($value[4]);
												if (date_format($date, "m") == date("m", strtotime("july"))){
													$count = 0;
													$temp = $value[0];
													?>
														<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php echo $value[3] ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "m/d/y") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "h:i A") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[5]);
														echo date_format($date, "h:i A") ?></label>
														<?php if ($value[8]) { ?>
															<input type="checkbox" name="checkI<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 2.5em;" value=1 disabled checked>
															<input type="hidden" name="checkI<?php echo $temp ?>" value = 1>
														<?php }
														else { ?>
															<input type="checkbox" name="checkI<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 2.5em;" value=0>
														<?php } ?>
														<?php if ($value[9]) { ?>
															<input type="checkbox" name="checkO<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 4.5em;" value=1 disabled checked>
															<input type="hidden" name="checkO<?php echo $temp ?>" value = 1>
														<?php }
														else { ?>
															<input type="checkbox" name="checkO<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 4.5em;" value=0>
														<?php } 
														if ($value[7] != NULL) { ?>
															<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; margin-left: 1.2em;"><?php echo $value[7]; ?></label>
														<?php }
														else{ ?>
															<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; margin-left: 1.2em;">EMPTY</label>
														<?php } ?>
														<br>
												<?php }
											} 
											if ($count) {
												goto jobskiplarge;
											}
											?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job" value="<?php echo $input; ?>">
												<input type="hidden" name="submit" value="<?php echo $sect; ?>">
												<input type="submit" name ="Sign-Up" value="CheckIO">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) {
										jobskiplarge: ?>
											<label class= "dataDis pressed" style="margin-left: 0.9em;padding-right: 0.2em; padding-left: 0.2em; width: 14em;">There are no shifts for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-xl-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style="margin-top: 2em;">
										<input type="hidden" name="submit" value="Gate">
										<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 4em;">PAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;">DAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">START</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">END</label>
										<br>
										<?php
										$input = $_POST['job']; 
										$sect = $_POST['submit']?>
										<input type="hidden" name="job" value="<?php echo $input ?>">
										<?php
										$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if (!$con) {
											die('Could not connect: ' . mysql_error());
										}
										$method = $_POST['submit'];
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input'";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											$count = 1;
											foreach ($array as $key => $value) {
											$date = date_create($value[4]);
												if (date_format($date, "m") == date("m", strtotime("july"))){ 
													$count = 0;
													$temp = $value[0];
													?>
														<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;"><?php echo $value[3] ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "m/d/y") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														echo date_format($date, "h:i A") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[5]);
														echo date_format($date, "h:i A") ?></label>
														<br>
												<?php } 
											} 
											if ($count) {
												goto jobskipsmall;
											} ?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job">
												<input type="hidden" name="submit">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) { 
											jobskipsmall: ?>
											<label class= "dataDis pressed" style="margin-left: 0.9em;padding-right: 0.2em; padding-left: 0.2em; width: 14em;">There are no shifts for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<form method="POST">
			<?php }
			//sign up for or remove sign up for a shift
		}
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		//$time = 1;
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		?>

		<?php endif; ?>
			<?php } ?> 
		<?php } ?>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['event'] == "Tortuga Nights") { ?>
				<!--Creates the tabs for all of the Tortuga Nights volunteering departments-->
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
		<!--Creates the tabs for all of the Tortuga Nights volunteering departments-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="event" value="Tortuga Nights">
				<input type="hidden" name ="Sign-Up">
				<input type="hidden" name="job">
				<input type="hidden" name="submit">
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -3em;">
					<div class = "d-none d-xl-block">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Set-Up") { ?>
									<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept pressed" value="Set-Up"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept unpressed" value="Set-Up"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Gate") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Gate"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Parking") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Parking"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Saftey") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Saftey"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Fire") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Fire"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Fire"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Bank") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Bank" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
									<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept pressed" value="Scuttlebutt"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept unpressed" value="Scuttlebutt"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								<div class = "col" style = "padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Titles") { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept pressed" value="Titles"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Titles"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Sanitation") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Sanitation"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Hearld") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Hearld"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Hearld"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em;">
									<?php if ($_POST['submit'] == "Tear Down") { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept pressed" value="Tear Down"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Tear Down"></input>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<!--Creates the tabs for all of the volunteering departments for a smaller screen-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="event" value="Tortuga Nights">
				<input type="hidden" name="job">
				<input type="hidden" name ="Sign-Up">
				<input type="hidden" name="submit">
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -3em;">
					<div class = "d-none d-lg-block d-xl-none">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Set-Up") { ?>
									<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept pressed" value="Set-Up"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept unpressed" value="Set-Up"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Gate") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Gate"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Parking") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Parking"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Saftey") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Saftey"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Fire") { ?>
									<input type="submit" name= "submit" class="RightButtonTopVolunteerDept pressed" value="Fire"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonTopVolunteerDept unpressed" value="Fire"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id="DeptRowTwo">
								
								<div class = "col" style = "padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Bank") { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept pressed" value="Bank" style="white-space: normal;"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Scuttlebutt") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Scuttlebutt"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Scuttlebutt"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
									<?php if ($_POST['submit'] == "Titles") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Titles"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Titles"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Sanitation") { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept pressed" value="Sanitation"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
								<?php } ?>
								</div>
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
									<?php if ($_POST['submit'] == "Hearld") { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept pressed" value="Hearld"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Hearld"></input>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 0.05em">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
									<?php if ($_POST['submit'] == "Tear Down") { ?>
									<input type="submit" name= "submit" style="display: flex; font-family: Pirates; font-size: 1.2em; text-decoration: none; border: 0.01em; border-color: transparent; align-content: center; justify-content: center; line-height: 1.4em; border-radius: 0em 0em 0.4em 0.4em; background: #000000; width: 5.5em; height: 3em;" class="pressed" value="Tear Down"></input>
								<?php }
								else { ?>
									<input type="submit" name= "submit" style="display: flex; font-family: Pirates; font-size: 1.2em; text-decoration: none; border: 0.01em; border-color: transparent; align-content: center; justify-content: center; line-height: 1.4em; border-radius: 0em 0em 0.4em 0.4em; background: #000000; width: 5.5em; height: 3em;" class="unpressed" value="Tear Down"></input>
								<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>

		<!--Creates the tabs for all of the volunteering departments for the smallest screen-->

		
		<div class = "container">
			<div class="d-lg-none">
				<div class = "d-flex justify-content-center">
					<div class = "row">
						<div class = "col">
							<div class="DepartmentDropDown">
								<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
									<button class="DeptDropDown"><?php echo $_POST['submit'] ?>:</button>
								<?php }
								else { ?>
									<button class="DeptDropDown">Select Department:</button>
								<?php } ?>
								<div class="DeptContent">
									<form method="POST">
										<fieldset>
											<input type="hidden" name="event" value="Tortuga Nights">
											<input type="hidden" name ="Sign-Up">
											<input type="hidden" name ="job">
											<input type="hidden" name="submit">
											<input type="submit" name="submit" value="Set-Up"></input>
											<input type="submit" name="submit" value="Gate"></input>
											<input type="submit" name="submit" value="Parking"></input>
											<input type="submit" name="submit" value="Saftey"></input>
											<input type="submit" name="submit" value="Fire"></input>
											<input type="submit" name="submit" value="Bank"></input>
											<input type="submit" name="submit" value="Scuttlebutt"></input>
											<input type="submit" name="submit" value="Titles"></input>
											<input type="submit" name="submit" value="Sanitation"></input>
											<input type="submit" name="submit" value="Hearld"></input>
											<input type="submit" name="submit" value="Tear Down"></input>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Creates Buttons inside of the other buttons-->
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['submit'] == "Set-Up") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Set-Up">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4em;" class= "alone pressed" name="job" value="Set Up">
									<?php $_POST['job'] = "Set Up"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4em;" class= "alone pressed" name="job" value="Set Up">
									<?php $_POST['job'] = "Set Up"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Gate") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Gate">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all gate go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Registration") { ?>
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob pressed" name="job" value="Registration">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob unpressed" name="job" value="Registration">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cat Herder") { ?>
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob pressed" name="job" value="Cat Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob unpressed" name="job" value="Cat Herder">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Dragon Herder") { ?>
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob pressed" name="job" value="Dragon Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob unpressed" name="job" value="Dragon Herder">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Registration") { ?>
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob pressed" name="job" value="Registration">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "LeftButtonJob unpressed" name="job" value="Registration">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cat Herder") { ?>
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob pressed" name="job" value="Cat Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.6em;" class= "MiddleButtonJob unpressed" name="job" value="Cat Herder">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Dragon Herder") { ?>
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob pressed" name="job" value="Dragon Herder">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "RightButtonJob unpressed" name="job" value="Dragon Herder">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Parking") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Parking">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Parking go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowOne">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "General Parking") { ?>
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob pressed" name="job" value="General Parking">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob unpressed" name="job" value="General Parking">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Main Gate") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Main Gate">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Main Gate">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "MiddleButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "MiddleButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Lot") { ?>
											<input type="submit" style="width: 4.2em;" class= "MiddleButtonJob pressed" name="job" value="Front Lot">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.2em;" class= "MiddleButtonJob unpressed" name="job" value="Front Lot">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Line") { ?>
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob pressed" name="job" value="Front Line">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob unpressed" name="job" value="Front Line">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Overnight Watch") { ?>
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob pressed" name="job" value="Overnight Watch">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob unpressed" name="job" value="Overnight Watch">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "General Parking") { ?>
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob pressed" name="job" value="General Parking">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.5em;" class= "LeftButtonJob unpressed" name="job" value="General Parking">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Main Gate") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Main Gate">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Main Gate">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "RightButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "RightButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center">
								<div  class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Lot") { ?>
											<input type="submit" style="width: 4.2em;" class= "LeftButtonJob pressed" name="job" value="Front Lot">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.2em;" class= "LeftButtonJob unpressed" name="job" value="Front Lot">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Front Line") { ?>
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob pressed" name="job" value="Front Line">
										<?php }
										else { ?> 
											<input type="submit" style="width: 4.5em;" class= "MiddleButtonJob unpressed" name="job" value="Front Line">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Overnight Watch") { ?>
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob pressed" name="job" value="Overnight Watch">
										<?php }
										else { ?> 
											<input type="submit" style="width: 6.8em;" class= "RightButtonJob unpressed" name="job" value="Overnight Watch">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Saftey") {
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Saftey">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Saftey go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Gate Sentry") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Gate Sentry">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Gate Sentry">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Station") { ?>
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob pressed" name="job" value="Station">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob unpressed" name="job" value="Station">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Rover") { ?>
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob pressed" name="job" value="Rover">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.5em;" class= "LeftButtonJob unpressed" name="job" value="Rover">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Gate Sentry") { ?>
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob pressed" name="job" value="Gate Sentry">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5em;" class= "MiddleButtonJob unpressed" name="job" value="Gate Sentry">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Station") { ?>
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob pressed" name="job" value="Station">
										<?php }
										else { ?> 
											<input type="submit" style="width: 3.6em;" class= "RightButtonJob unpressed" name="job" value="Station">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Fire") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Fire">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Fire go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cigarette Butt Turn In") { ?>
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob pressed" name="job" value="Cigarette Butt Turn In">
										<?php }
										else { ?> 
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob unpressed" name="job" value="Cigarette Butt Turn In">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Butt Can Checks") { ?>
											<input type="submit" style="width: 7em;" class= "RightButtonJob pressed" name="job" value="Butt Can Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 7em;" class= "RightButtonJob unpressed" name="job" value="Butt Can Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Cigarette Butt Turn In") { ?>
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob pressed" name="job" value="Cigarette Butt Turn In">
										<?php }
										else { ?> 
											<input type="submit" style="width: 9.4em;" class= "LeftButtonJob unpressed" name="job" value="Cigarette Butt Turn In">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Butt Can Checks") { ?>
											<input type="submit" style="width: 7em;" class= "RightButtonJob pressed" name="job" value="Butt Can Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 7em;" class= "RightButtonJob unpressed" name="job" value="Butt Can Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Bank") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Bank">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Teller">
									<?php $_POST['job'] = "Teller"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Teller">
									<?php $_POST['job'] = "Teller"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Scuttlebutt") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Scuttlebutt">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.4em;" class= "alone pressed" name="job" value="Skuttler">
									<?php $_POST['job'] = "Skuttler"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.4em;" class= "alone pressed" name="job" value="Skuttler">
									<?php $_POST['job'] = "Skuttler"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Titles") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Titles">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.4em;" class= "alone pressed" name="job" value="Titler">
									<?php $_POST['job'] = "Titler"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.4em;" class= "alone pressed" name="job" value="Titler">
									<?php $_POST['job'] = "Titler"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Sanitation") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Sanitation">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all Fire go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 1em;" >
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Biffy Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob pressed" name="job" value="Biffy Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob unpressed" name="job" value="Biffy Checks">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Trash Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob pressed" name="job" value="Trash Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob unpressed" name="job" value="Trash Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Biffy Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob pressed" name="job" value="Biffy Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "LeftButtonJob unpressed" name="job" value="Biffy Checks">
										<?php } ?>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<?php if ($_POST['job'] == "Trash Checks") { ?>
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob pressed" name="job" value="Trash Checks">
										<?php }
										else { ?> 
											<input type="submit" style="width: 5.5em;" class= "RightButtonJob unpressed" name="job" value="Trash Checks">
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Hearld") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Hearld">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Hearld">
									<?php $_POST['job'] = "Hearld"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 3.5em;" class= "alone pressed" name="job" value="Hearld">
									<?php $_POST['job'] = "Hearld"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if ($_POST['submit'] == "Tear Down") { ?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<input type="hidden" name="submit" value="Tear Down">
						<input type="hidden" name ="Sign-Up">
						<!-- Buttons for all set-up go here -->
						<!-- button example. they must use this format aka the name must be job-->
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Tear Down">
									<?php $_POST['job'] = "Tear Down"; ?>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<input type="submit" style="width: 4.5em;" class= "alone pressed" name="job" value="Tear Down">
									<?php $_POST['job'] = "Tear Down"; ?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			//look up  shifts for job type and allow sign up
			if ($_POST['job'] != NULL) { 
				?>
				<form method="POST">
					<fieldset>
						<input type="hidden" name="event" value="Tortuga Nights">
						<div class = "d-none d-lg-none d-xl-block">
							<div class="d-flex justify-content-left">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style="margin-left: 14em; margin-top: 2em;">
										<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 4em;">PAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;">DAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">START</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">END</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Check In</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.3em;">Check Out</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">Email</label>
										<br>
										<?php
										$input = $_POST['job']; 
										$sect = $_POST['submit']?>
										<input type="hidden" name="job" value="<?php echo $input ?>">
										<?php
										$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if (!$con) {
											die('Could not connect: ' . mysql_error());
										}
										$method = $_POST['submit'];
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input'";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											$count = 1;
											foreach ($array as $key => $value) { 
												$date = date_create($value[4]);
												if (date_format($date, "m") == date("m", strtotime("september"))){
													$count = 0;
													$temp = $value[0];
													?>
														<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php echo $value[3]; ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "m/d/y") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "h:i A") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[5]);
														echo date_format($date, "h:i A") ?></label>
														<?php if ($value[8]) { ?>
															<input type="checkbox" name="checkI<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 2.5em;" value=1 disabled checked>
															<input type="hidden" name="checkI<?php echo $temp ?>" value = 1>
														<?php }
														else { ?>
															<input type="checkbox" name="checkI<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 2.5em;" value=0>
														<?php } ?>
														<?php if ($value[9]) { ?>
															<input type="checkbox" name="checkO<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 4.5em;" value=1 disabled checked>
															<input type="hidden" name="checkO<?php echo $temp ?>" value = 1>
														<?php }
														else { ?>
															<input type="checkbox" name="checkO<?php echo $temp ?>" style="transform: scale(1.6); margin-left: 4.5em;" value=0>
														<?php }
														if ($value[7] != NULL) { ?>
															<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; margin-left: 1.2em;"><?php echo $value[7]; ?></label>
														<?php }
														else{ ?>
															<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; margin-left: 1.2em;">EMPTY</label>
														<?php } ?>
														<br>
												<?php }
											} 
											if ($count) {
												goto jobskiplarget;
											}
											?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job" value="<?php echo $input; ?>">
												<input type="hidden" name="submit" value="<?php echo $sect; ?>">
												<input type="submit" name ="Sign-Up" value="CheckIO">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) {
										jobskiplarget: ?>
											<label class= "dataDis pressed" style="margin-left: 0.9em;padding-right: 0.2em; padding-left: 0.2em; width: 14em;">There are no shifts for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-xl-none">
							<div class="d-flex justify-content-center">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style="margin-top: 2em;">
										<input type="hidden" name="submit" value="Gate">
										<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 4em;">PAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;">DAY</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">START</label>
										<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">END</label>
										<br>
										<?php
										$input = $_POST['job']; 
										$sect = $_POST['submit']?>
										<input type="hidden" name="job" value="<?php echo $input ?>">
										<?php
										$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if (!$con) {
											die('Could not connect: ' . mysql_error());
										}
										$method = $_POST['submit'];
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input'";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											$count = 1;
											foreach ($array as $key => $value) {
											$date = date_create($value[4]);
												if (date_format($date, "m") == date("m", strtotime("september"))){ 
													$count = 0;
													$temp = $value[0];
													?>
														<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;"><?php echo $value[3] ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
														$date = date_create($value[4]);
														echo date_format($date, "m/d/y") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														echo date_format($date, "h:i A") ?></label>
														<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
														$date = date_create($value[5]);
														echo date_format($date, "h:i A") ?></label>
														<br>
												<?php } 
											} 
											if ($count) {
												goto jobskipsmallt;
											} ?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job">
												<input type="hidden" name="submit">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) { 
											jobskipsmallt: ?>
											<label class= "dataDis pressed" style="margin-left: 0.9em;padding-right: 0.2em; padding-left: 0.2em; width: 14em;">There are no shifts for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
				<form method="POST">
			<?php }
			//sign up for or remove sign up for a shift
		}
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		//$time = 1;
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		?>

		<?php endif; ?>
			<?php } ?> 
		<?php } ?>
		<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['Sign-Up'] == "CheckIO") {
				if (isset($_POST['shift'])) {
					$tmpemail = NULL;
					$tmpCI = NULL;
					$tmpCO = NULL;
					$tmppay = NULL;
					$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					if (!$con) {
						die('Could not connect: ' . mysql_error());
					}
					foreach ($_POST['shift'] as $key) {
						//SELECT * FROM `jobs` WHERE `ID` = 8
						if (isset($_POST['checkI'.$key])) {
							$tmpCI = 1;
						}
						else{
							$tmpCI = 0;
						}
						if (isset($_POST['checkO'.$key])) {
							$tmpCO = 1;
							$pullmoney = "SELECT * FROM jobs WHERE `jobs`.`ID` = '$key'";
                    		$moneytemp=mysqli_query($con, $pullmoney);
                    		$jobinfo = mysqli_fetch_row($moneytemp);
                    		$cash = $jobinfo[3];
                    		$queryIn = "SELECT Accounts FROM users WHERE Username = '$jobinfo[7]'";
							$resultIn = mysqli_query($con, $queryIn);
							$row1=mysqli_fetch_row($resultIn);
							$parsed_json = json_decode($row1[0], true);
							$accnumss = $parsed_json['id'];
							$queryIn = "SELECT Accounts FROM users WHERE Username = '$jobinfo[7]'";
							$resultIn = mysqli_query($con, $queryIn);
							$queryTo = "SELECT Ballance FROM accounts WHERE ID = '$accnumss[0]'";
							$resultTo = mysqli_query($con, $queryTo);
							$row3=mysqli_fetch_row($resultTo);
							$addat = $row3[0] + $cash;
							$updateto = "UPDATE accounts SET Ballance = '$addat' WHERE accounts.ID = '$accnumss[0]'";
							$deduct = mysqli_query($con, $updateto); //sets the new ballance of the account being transftered into.
							//creates a history of the transaction in the account to
							$queryHistTo="SELECT history FROM accounts WHERE ID = '$accnumss[0]'";
							$resultHistTo= mysqli_query($con, $queryHistTo);
							$rowHistTo=mysqli_fetch_row($resultHistTo);
							$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
							$dep=["Depoited",$cash, $jobinfo[1].": ".$jobinfo[2]];
							date_default_timezone_set('Etc/GMT+8');
							$timeStamp=date('Y/m/d H:i:s');
							$parsed_jsonHistTo[$timeStamp]=$dep;
							$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
							$NOSPECIALCHARACERSto = mysqli_real_escape_string($con, $enco_jsonHistTo);
							$queryHistTo="UPDATE accounts SET history = '$NOSPECIALCHARACERSto' WHERE accounts.ID = '$accnumss[0]'";
							$resultHistTo=mysqli_query($con,$queryHistTo);
							//put pay them function here
						}
						else{
							$tmpCO = 0;
						}
						$update = "UPDATE jobs SET checkI = '$tmpCI', checkO = '$tmpCO' WHERE `jobs`.`ID` = '$key'";
                    	$temp=mysqli_query($con, $update);
					}
				}
			}
		}
		mysqli_close($con);
		?>
		
	</body>

</html>