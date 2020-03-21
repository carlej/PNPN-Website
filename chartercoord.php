<!doctype html>
<html>
	<head>
		<?php 
		include("Javascript/Connections/req.php");
		if ($_SESSION['perm']!="c" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
		}
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		?>

		<title>Charter</title>
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
						<a href="chartercoord.php" class="RightButtonFourPressed">Charter/Land Grant</a>
					<?php endif;?>
				</div>
				</div>
			</div>
			</div>
		</div>
		
		<!-- Code for the Personal, Coordinator, and Charter Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-xl-none">
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
					<a href="volunteercoord.php" class="MenuButtonUn">Coordinator</a>
					<?php endif;?>
				</div>
				<div class="col-lg">
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['perm']=="c" || $_SESSION['perm']=="z")): ?>
						<a href="chartercoord.php" class="MenuButtonPressed">Charter/Land Grant</a>
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
				<div class = "container-flow" id = "SwitchButtonsVolunteerDept" style="margin-top: 8em;">
					<div class = "d-none d-xl-block">
						<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
							<div class = "row" id = "DeptRowOne">
								<div class = "col" style="padding-right: 0.05em;">
									<input type="submit" name="delim" class="MiddleButtonVolunteerDept" value="Charter">
								</div>
								<input type="submit" name="delim" class="MiddleButtonVolunteerDept" value="Langrant">
								<input type="hidden" name= "chart"></input>
								<input type="hidden" name="edit">
								<input type="hidden" name="add">
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if ($_POST['delim']=='Charter') {
				$queryCharter = "SELECT * FROM charter WHERE landgrant = '0'";
				$resultCharter = mysqli_query($con,$queryCharter);
				$array = $resultCharter->fetch_all(MYSQLI_NUM);
				foreach ($array as $key => $value) {
					//echo $value[0];
				if (!$_POST['chart']) {
					$queryCharter = "SELECT * FROM charter";
					$resultCharter = mysqli_query($con,$queryCharter);
					$array = $resultCharter->fetch_all(MYSQLI_NUM);?>
					<form method="POST">
						<fieldset><?php
							foreach ($array as $key => $value) {
								?>
								<div class = "container-flow" id = "SwitchButtonsVolunteerSection">
									<div class="d-none d-xl-block">
										<div class = "d-flex justify-content-center">
											<input type="submit" name= "chart" value='<?php echo $value[0]?>'></input>
							<?php
							}?>
											<input type="hidden" name="delim" value="Charter">
											<input type="hidden" name="edit">
											<input type="hidden" name="add">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					<?php
				}
				else{
					$chartName = $_POST['chart'];
					$queryCharter = "SELECT * FROM charter WHERE name = '$chartName'";
					$resultCharter = mysqli_query($con,$queryCharter);
					$row = mysqli_fetch_row($resultCharter);
					echo "<p>$row[0]</p>";
					$parsed_member_json=json_decode($row[3],true);
					$accmem=$parsed_member_json;
					if ($_POST['edit']=="Remove") {
						array_splice($accmem, $_POST['name'], 1);
						$remove=json_encode($accmem);
						$update = "UPDATE charter SET part = '$remove' WHERE name = '$row[0]'";
						$inup= mysqli_query($con, $update);
					}
					else if ($_POST['edit']=="Add") {
						echo "<p>Members:</p>";?>
					<form method="POST">
						<fieldset><?php
						if (!$_POST['add']) {
						?>
							<form method="POST" id="SearchBy2">
							<fieldset>
								<label>Select: </label>
										<p id="searcher">
											<label>Add: </label>
											<select name="type1" class="SearchBy3" style="margin-bottom: 0em">
												<option>Search by:</option>
												<option value="Pname">Pirate Name</option>
												<option value="Fname">First Name</option>
												<option value="Lname">Last Name</option>
												<option value="Username">Email</option>
												<option value="shipID" style="display:none;">shipID</option>
												<option value="Ship">Ship/House</option>
												<option value="fleetID" style="display:none;">fleetID</option>
												<option value="Fleet">Fleet/Alliance</option>
											</select>
											<input type="search" name="input1" id="input" style="width: 10%; margin-bottom: 0.3em" minlength="3">
											</p>
										</p>
										<label>Add: </label>
											<select name="type2" class="SearchBy3" style="margin-bottom: 0em">
												<option>Search by:</option>
												<option value="Pname">Pirate Name</option>
												<option value="Fname">First Name</option>
												<option value="Lname">Last Name</option>
												<option value="Username">Email</option>
												<option value="shipID" style="display:none;">shipID</option>
												<option value="Ship">Ship/House</option>
												<option value="fleetID" style="display:none;">fleetID</option>
												<option value="Fleet">Fleet/Alliance</option>
											</select>
											<input type="search" name="input2" id="input" style="width: 10%; margin-bottom: 0.3em" minlength="3">
											</p>
										</p>
										<label>Add: </label>
											<select name="type3" class="SearchBy3" style="margin-bottom: 0em">
												<option>Search by:</option>
												<option value="Pname">Pirate Name</option>
												<option value="Fname">First Name</option>
												<option value="Lname">Last Name</option>
												<option value="Username">Email</option>
												<option value="shipID" style="display:none;">shipID</option>
												<option value="Ship">Ship/House</option>
												<option value="fleetID" style="display:none;">fleetID</option>
												<option value="Fleet">Fleet/Alliance</option>
											</select>
											<input type="search" name="input3" id="input" style="width: 10%; margin-bottom: 0.3em" minlength="3">
											</p>
										</p>
										<label>Add: </label>
											<select name="type4" class="SearchBy3" style="margin-bottom: 0em">
												<option>Search by:</option>
												<option value="Pname">Pirate Name</option>
												<option value="Fname">First Name</option>
												<option value="Lname">Last Name</option>
												<option value="Username">Email</option>
												<option value="shipID" style="display:none;">shipID</option>
												<option value="Ship">Ship/House</option>
												<option value="fleetID" style="display:none;">fleetID</option>
												<option value="Fleet">Fleet/Alliance</option>
											</select>
											<input type="search" name="input4" id="input" style="width: 10%; margin-bottom: 0.3em" minlength="3">
											</p>
										</p>
										<label>Add: </label>
											<select name="type5" class="SearchBy3" style="margin-bottom: 0em">
												<option>Search by:</option>
												<option value="Pname">Pirate Name</option>
												<option value="Fname">First Name</option>
												<option value="Lname">Last Name</option>
												<option value="Username">Email</option>
												<option value="shipID" style="display:none;">shipID</option>
												<option value="Ship">Ship/House</option>
												<option value="fleetID" style="display:none;">fleetID</option>
												<option value="Fleet">Fleet/Alliance</option>
											</select>
											<input type="search" name="input5" id="input" style="width: 10%; margin-bottom: 0.3em" minlength="3">
											</p>
										</p>
										<input type="submit" name="add" value="Add">
										<input type="hidden" name="delim" value="Charter">
								<input type="hidden" name= "chart" value='<?php echo $row[0]?>'></input>
								<input type="hidden" name= "edit" value="Add">
							</fieldset>
						</form>
						<?php
						}
						else{
							$num=0;
							for ($i=1; $i < 6; $i++) { 
								if ($_POST['input'.$i]) {
									$method = $_POST['type'.$i];
									$input = $_POST['input'.$i];
									$queryUser = "SELECT Username, Fname, Lname, Pname FROM users WHERE `$method` LIKE '%$input%'";
									$resultUser = mysqli_query($con,$queryUser);
									//echo $queryUser;
									if (mysqli_num_rows($resultUser)==1) {
										$num++;
										$rowUser = mysqli_fetch_row($resultUser);
										array_push($accmem, $rowUser[0]);
									}
									else if (mysqli_num_rows($resultUser)>1) {
										array_push($mults,$i);
									}
									else{
										# code...
									}
								}
							}
							$add=json_encode($accmem);
							$update = "UPDATE charter SET part = '$add' WHERE name = '$row[0]'";
							$inup= mysqli_query($con, $update);
						}
					}
					?>
					<form method="POST">
						<fieldset>
							<?php if($_POST['edit']!="Add" xor $_POST['add']): ?>
								<input type="submit" name= "edit" value="Add"></input>
								<input type="hidden" name="add">
							<?php endif;?>
							<?php
							echo "<p>Members:</p>";
							foreach ($accmem as $key => $value) {
								if ($value) {
									$queryUser = "SELECT * FROM users WHERE Username = '$value'";
									$resultUser = mysqli_query($con,$queryUser);
									$rowUser = mysqli_fetch_row($resultUser);
									if ($rowUser[5]) {
										$name = $rowUser[5];
									}
									else{
										$name = "{$rowUser[3]} {$rowUser[4]}";
									}
									echo $name;
									?>
									<input type="submit" name= "edit" value="Remove"></input>
									<input type="hidden" name="name" value='<?php echo $key?>'>
									<input type="hidden" name="add">
									<?php
								}
							}?>
							<p>
								<input type="hidden" name="delim" value="Charter">
								<input type="hidden" name= "chart" value='<?php echo $row[0]?>'></input>
							</p>
						</fieldset>
					</form>
					<?php
				}}}
			else if ($_POST['delim']=="Langrant") {
				$queryCharter = "SELECT * FROM charter WHERE landgrant = '1'";
				$resultCharter = mysqli_query($con,$queryCharter);
				$array = $resultCharter->fetch_all(MYSQLI_NUM);
				foreach ($array as $key => $value) {
					echo $value[0];
				}
			}
		}
		?>
	</body>
</html>
