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
				<input type="hidden" name="job" value="NULL">
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
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
				<?php }
				else { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
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
				<?php } ?>
			</fieldset>
		</form>
		<form method="POST">
			<fieldset>
				<input type="hidden" name="job" value="NULL">
				<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -7em;">
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
				<?php }
				else { ?>
					<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: -7em;">
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
				<?php } ?>
			</fieldset>
		</form>
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
		<?php endif; ?>
	</body>

</html>


