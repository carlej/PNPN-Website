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

		<title>Volunteering Port Nassau</title>
		<?php include("Views/Partials/header.php");?>

		<!-- Creates the Personal, Coordinator, and Charter Buttons and who has access to them-->
		<div class = "container-flow" id = "SwitchButtonsFour">
			<div class="d-none d-xl-block">
			<div class = "d-flex justify-content-center">
				<div class = "row" id ="ButtonsRow">
				<div class = "col" style="padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="LeftButtonFourPressed">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-left: 0.05em; padding-right: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonFourUn">Tortuga Nights</a>
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
						<a href="volunteerNassau.php" class="LeftButtonTopTwoPressed">Port Nassau</a>
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
				<div class = "col-xl">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerNassau.php" class="MenuButtonPressed">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col-xl">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="volunteerTortuga.php" class="MenuButtonUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class = "col-xl">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col-xl">
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
						<a href="volunteerNassau.php" class="LeftButtonThreePressed">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col" style="padding-right: 0.05em; padding-left: 0.05em">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerTortuga.php" class="MiddleButtonThreeUn">Tortuga Nights</a>
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
						<a href="volunteerNassau.php" class="MenuButtonPressed">Port Nassau</a>
					<?php endif;?>
				</div>
				<div class = "col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="volunteerTortuga.php" class="MenuButtonUn">Tortuga Nights</a>
					<?php endif;?>
				</div>
				<div class="col-lg" style="padding-right: 0.05em" >
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
						<a href="charter.php" class="MenuButtonUn">Charter/Land Grants</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
	</head>
		
		
	</head>
	<body>

		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
		<!--Creates the tabs for all of the volunteering departments-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="job">
				<input type="hidden" name ="Sign-Up">
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
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
				<?php }
				else { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
						<div class = "d-none d-xl-block">
							<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id = "DeptRowOne">
									<div class = "col" style="padding-right: 0.05em;">
										<input type="submit" name= "submit" class="LeftButtonTop2VolunteerDept unpressed" value="Set-Up">
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Fire"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em;">
										<input type="submit" name= "submit" class="RightButtonTop2VolunteerDept unpressed" value="Scuttlebutt"></input>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style = "padding-right: 0.05em;">
										<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Titles"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Hearld"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Lost Cove"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Monkey Island" style="white-space: normal;"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em;">
										<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Tear Down"></input>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</fieldset>
		</form>
		<!--Creates the tabs for all of the volunteering departments for a smaller screen-->
		<form method="POST">
			<fieldset>
				<input type="hidden" name="job">
				<input type="hidden" name ="Sign-Up">
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -7em;">
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
				<?php }
				else { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -7em;">
						<div class = "d-none d-lg-block d-xl-none">
							<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id = "DeptRowOne">
									<div class = "col" style="padding-right: 0.05em;">
										<input type="submit" name= "submit" class="LeftButtonTopVolunteerDept unpressed" value="Set-Up">
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Gate"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Parking"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Saftey"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="RightButtonTopVolunteerDept unpressed" value="Fire"></input>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center" style="margin-left: -20.2em;">
								<div class = "row" id="DeptRowTwo">
									
									<div class = "col" style = "padding-right: 0.05em">
										<input type="submit" name= "submit" class="LeftButtonBottomVolunteerDept unpressed" value="Bank" style="white-space: normal;"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Scuttlebutt"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em;">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Titles"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Sanitation"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
										<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Hearld"></input>
									</div>
								</div>
							</div>
							<div class = "d-flex justify-content-center" style="margin-left: -20.2em; margin-top: 0.05em">
								<div class = "row" id = "DeptRowOne">
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Lost Cove"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
										<input type="submit" name= "submit" class="MiddleButtonVolunteerDept unpressed" value="Monkey Island" style="white-space: normal;"></input>
									</div>
									<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em; margin-top: 0.05em">
										<input type="submit" name= "submit" class="RightButtonBottomVolunteerDept unpressed" value="Tear Down"></input>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</fieldset>
		</form>

		<!--Creates the tabs for all of the volunteering departments for the smallest screen-->

		
		<div class = "container">
			<div class="d-lg-none">
				<div class = "d-flex justify-content-center">
					<div class = "row" style="margin-top: -7em;">
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
											<input type="hidden" name ="Sign-Up">
											<input type="hidden" name ="job">
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
						<div class = "d-none d-lg-block d-xl-block">
							<div class="d-flex justify-content-left">
								<div class = "row" id="DeptRowTwo">
									<div class = "col" style="margin-left: 14em; margin-top: 2em;">
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
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input' AND user IS NULL";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											foreach ($array as $key => $value) { 
												$temp = $value[0];
												//$queryJob = "SELECT * FROM jobs WHERE ID = '$temp'";
												//$resultJob = mysqli_query($con, $queryJob);
												//$rowJob = mysqli_fetch_row($resultJob);
												?>
													<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;"><?php echo $value[3] ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "m/d/y") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "h:i A") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[5]);
													echo date_format($date, "h:i A") ?></label>
													<br>
											<?php } ?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job" value="<?php echo $_POST['job']; ?>">
												<input type="hidden" name="submit" value="<?php echo $_POST['submit']; ?>">
												<input type="submit" name ="Sign-Up" value="Sign Up">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) { ?>
											<label class= "dataDis pressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 20em;">There are no shifts that are free for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="d-lg-none">
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
										$queryJob = "SELECT * FROM jobs WHERE section = '$sect' AND job = '$input' AND user IS NULL";
										$resultJob= mysqli_query($con,$queryJob);
										$array=NULL;
										$array = $resultJob->fetch_all(MYSQLI_NUM);
										if (mysqli_num_rows($resultJob)>0) {
											foreach ($array as $key => $value) { 
												$temp = $value[0];
												//$queryJob = "SELECT * FROM jobs WHERE ID = '$temp'";
												//$resultJob = mysqli_query($con, $queryJob);
												//$rowJob = mysqli_fetch_row($resultJob);
												?>
													<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;"><?php echo $value[3] ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "m/d/y") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "h:i A") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[5]);
													echo date_format($date, "h:i A") ?></label>
													<br>
											<?php } ?>
											<div class = "col" style="font-family: pirates;">
												<input type="hidden" name="job">
												<input type="hidden" name="submit">
												<input type="submit" name ="Sign-Up" value="Sign Up">
											</div>
											<?php
										}
										else if (mysqli_num_rows($resultJob)<1) { ?>
											<label class= "dataDis pressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 20em;">There are no shifts that are free for this job</label>
										<?php }
										?>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			//sign up for or remove sign up for a shift
			if (isset($_POST['submit']) && $_POST['submit'] != "Your Shifts") {
				$tmpsub = NULL;
				if (isset($_POST['job'])) {
					$tmpjob = NULL;
					if ($_POST['Sign-Up'] == "Sign Up"){
						if (isset($_POST['shift'])) {
							foreach ($_POST['shift'] as $key) {
								$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
								if (!$con) {
									die('Could not connect: ' . mysql_error());
								}
								$method = $_POST['submit'];
								$username = $_SESSION['username'];

								$update = "UPDATE jobs SET user = '$username' WHERE `jobs`.`ID` = '$key'";
	                            $temp = mysqli_query($con, $update);
	                        }
						}
					}
					else if ($_POST['Sign-Up'] == "Remove Shift") {
						if (isset($_POST['shift'])) {
							foreach ($_POST['shift'] as $key) {
								$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
								if (!$con) {
									die('Could not connect: ' . mysql_error());
								}
								$method = $_POST['submit'];
								$username = $_SESSION['username'];

								$update = "UPDATE jobs SET user = NULL WHERE `jobs`.`ID` = '$key'";
	                            $temp=mysqli_query($con, $update);
	                            $_POST['submit'] = "Your Shifts";
	                            //echo("<meta http-equiv='refresh' content='0.01'>");
	                        }
						}
					}
				}
			}
		}
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		?>
		<form method="POST">
			<fieldset>
				<div class="d-flex justify-content-center">
					<input type="hidden" name="job">
					<input type="hidden" name ="Sign-Up">
					<input type="submit" class= "alone unpressed" name="submit" value="Your Shifts">
				</div>
			</fieldset>
		</form>
		
		<?php
		//show the shifts that you are signed up for
		if (isset($_POST['submit'])) {
			if ($_POST['submit'] == "Your Shifts") {
				$username = $_SESSION['username'];
				$signShift = "SELECT * FROM `jobs` WHERE `user` = '$username'";
				$temp=mysqli_query($con, $signShift);
				if (mysqli_num_rows($temp)>0) {
					$array = $temp->fetch_all(MYSQLI_NUM); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-block d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 6em;">SECTION</label>
											<label class= "dataDis unpressed" style=" padding-right: 0.2em; padding-left: 0.2em; width: 9.4em;">POSITION</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">PAY</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;">DAY</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">START</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;">END</label>
											<br>
											<?php
											$input = $_POST['job']; ?>
											<input type="hidden" name="job" value="<?php echo $input ?>">
											<?php
											$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
											if (!$con) {
												die('Could not connect: ' . mysql_error());
											}
											$username = $_SESSION['username'];
											$queryShift = "SELECT * FROM jobs WHERE user = '$username' ORDER BY start ASC";
												$resultShift = mysqli_query($con, $queryShift);
											$array=NULL;
											$array = $resultShift->fetch_all(MYSQLI_NUM);
											$num = 1;
											if (mysqli_num_rows($resultShift)<0) { ?>
												<label class= "dataDis pressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 20em;">There are no shifts that are free for this job</label>
											<?php }
											foreach ($array as $key => $value) { 
												$temp = $value[0];
												?>
													<input type="checkbox" name="shift[]" style="transform: scale(1.6);" value="<?php echo $temp ?>">
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 6em;"><?php echo $value[1] ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 9.4em;"><?php echo $value[2] ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;"><?php echo $value[3] ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.4em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "m/d/y") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[4]);
													echo date_format($date, "h:i A") ?></label>
													<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4.6em;"><?php
													$date = date_create($value[5]);
													echo date_format($date, "h:i A") ?></label>
													<br>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="job">
							<input type="hidden" name="submit">
							<div class = "col" style="font-family: pirates; margin-left: 14em;">
								<input type="submit" name ="Sign-Up" value="Remove Shift">
							</div>
						</fieldset>
					</form>
					<?php
				}
				else if (mysqli_num_rows($temp)<1) { ?>
					<div class="d-flex justify-content-center">
						<label class= "dataDis pressed" style="margin-top: 1em; padding-right: 0.2em; padding-left: 0.2em; width: 20em;">You have no shifts your signed up for</label>
					</div>
				<?php }
			}
		}
		//$time = 1;
		//$cenvertedTime = date('Y-m-d H:i:s',strtotime('+'.$time.' hour',strtotime($startTime)));//add time to datetime object
		mysqli_close($con);
		?>

		<?php endif; ?>
		


		<!--Creates coming soon message for non c and z users-->
		<div class = "container-flow">
			<div class = "d-flex justify-content-center">
				<div class="row" id="ComingSoon">
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']!="c" && $_SESSION['perm']!="z")): ?>
				<div>Coming Soon!!</div>
				<?php endif;?>
			</div>
		</div>

	</body>
</html>
