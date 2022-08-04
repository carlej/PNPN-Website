<?php //This displays what the teller will see when they go to the teller section of their screen. A teller is determined by a simple letter in their user on the database allowing us to track who does what instead of havign just one teller account.?>

<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		if ($_SESSION['perm']!="b" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if ($_SESSION['perm'] != 'z') { ?>
			<script type="text/javascript">window.location.href="bank.php"</script> <?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || $_SESSION['perm'] =="z") {
			$usename = $_SESSION['username'];
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
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
							<div><label>Edit Data Base from Search:</label></div>
							<select name="type" style="margin-left: 1em; margin-bottom: 0.5em">
								<option>Search By:</option>
								<option value="Pname">Pirate Name</option>
								<option value="Fname">First Name</option>
								<option value="Lname">Last Name</option>
								<option value="Username">Email</option> 
								<option value="ShipID">ShipID</option>
								<option value="Ship">Ship/House</option>
								<option value="FleetID">FleetID</option>
								<option value="Fleet">Fleet/Alliance</option>
								<option value="Account">Account Number</option>
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
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div calss = "col-2">
							<div><label>Edit Data Base from Code:</label> <label style="color: red;" >DON'T TOUCH UNLESS YOU KNOW MYSQL AND THE DATABASE STRUCTURE</label></div>
						</div>
						<div class = "col" style="margin-bottom: 0.5em;">
							<input type="search" class="required" name="input" id= "SearchBox" minlength="3">
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Launch" class="submit">
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
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			$input = mysqli_real_escape_string($con, $_POST['input']);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			} 
			if ($_POST['type'] == 'Ship') {
				$query = "SELECT * FROM ship WHERE Name LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				if (mysqli_num_rows($result)>1) { 
					$array = $result->fetch_all(MYSQLI_NUM); ?>
					<form method = "POST">
						<fieldset>
							<div class = "container" id = "Search">
								<div class = "d-flex-row">
									<div class = "SSearch">
									<?php echo '<label>Search by: </label><select name="input">';
										//echo '<form method="post" id = "select">';
									foreach ($array as $key => $value) {//this will display the name of each captain as each should be different
									//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
									$temp = $value[2];
									$queryUser = "SELECT * FROM users WHERE Username = '$temp'";
									$resultUser = mysqli_query($con, $queryUser);
									$rowUser = mysqli_fetch_row($resultUser);
									if ($rowUser[5]==NULL) {
						                $name = $rowUser[3].' '.$rowUser[4];
						            }
						            else
						                $name = $rowUser[5];
									echo '<option value="'.$value[0].'">"Captain: " '.$name.'</option>';
									}
									//echo '</form>';
									$input2 = mysqli_real_escape_string($con, $_POST['input']);
									$_SESSION['stype']="shipID";
									echo '</select><label for="input"></label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="ShipID">';?>
									</div>
								</div>
							</div>
						</fieldset>
					</form> <?php
				}
				else{
					$row=mysqli_fetch_row($result); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-none d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;">ID</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 7.7em;">Captain</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Account</label>
											<br>
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;"><?php echo $row[0] ?></label>
											<input type="text" name="name" value="<?php echo $row[1] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 5.3em;">
											<input type="text" name="captain" value="<?php echo $row[2] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 10em;">
											<?php 
											header('Content-Type: application/json');
											//print($row[4]); //prints a json
											$account = json_decode($row[4],true); 
											$account = $account['id'];
											//$tmp = JSON.stringify(json_encode($row[4]));
											?>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;"><?php echo $account[0]; ?></label>
											<br>
											<input type="submit" name= "submit" value="Change" class="submit" style="margin-left: 0.9em;">
											<input type="hidden" name="type" value="ShipID">
											<input type="hidden" name="diff" value="<?php echo $row[0] ?>">

										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				<?php
				}
			}
			else if ($_POST['type'] == 'ShipID') {
				$query = "SELECT * FROM ship WHERE ID = '$input'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-none d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;">ID</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 7.7em;">Captain</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Account</label>
											<br>
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;"><?php echo $row[0] ?></label>
											<input type="text" name="name" value="<?php echo $row[1] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 5.3em;">
											<input type="text" name="captain" value="<?php echo $row[2] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 10em;">
											<?php 
											header('Content-Type: application/json');
											//print($row[4]); //prints a json
											$account = json_decode($row[4],true); 
											$account = $account['id'];
											//$tmp = JSON.stringify(json_encode($row[4]));
											?>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;"><?php echo $account[0]; ?></label>
											<br>
											<input type="submit" name= "submit" value="Change" class="submit" style="margin-left: 0.9em;">
											<input type="hidden" name="type" value="ShipID">
											<input type="hidden" name="diff" value="<?php echo $row[0] ?>">

										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				<?php
			}
			else if ($_POST['type'] == 'Fleet') {
				$query = "SELECT * FROM fleet WHERE Name LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				if (mysqli_num_rows($result)>1) { 
					$array = $result->fetch_all(MYSQLI_NUM); ?>
					<form method = "POST">
						<fieldset>
							<div class = "container" id = "Search">
								<div class = "d-flex-row">
									<div class = "SSearch">
									<?php echo '<label>Search by: </label><select name="input">';
										//echo '<form method="post" id = "select">';
									foreach ($array as $key => $value) {//this will display the name of each captain as each should be different
									//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
									$temp = $value[2];
									$queryUser = "SELECT * FROM users WHERE Username = '$temp'";
									$resultUser = mysqli_query($con, $queryUser);
									$rowUser = mysqli_fetch_row($resultUser);
									if ($rowUser[5]==NULL) {
						                $name = $rowUser[3].' '.$rowUser[4];
						            }
						            else
						                $name = $rowUser[5];
									echo '<option value="'.$value[0].'">"Captain: " '.$name.'</option>';
									}
									//echo '</form>';
									$input2 = mysqli_real_escape_string($con, $_POST['input']);
									$_SESSION['stype']="fleetID";
									echo '</select><label for="input"></label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="FleetID">';?>
									</div>
								</div>
							</div>
						</fieldset>
					</form> <?php
				}
				else{
					$row=mysqli_fetch_row($result); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-none d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;">ID</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 7.7em;">Admiral</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Account</label>
											<br>
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;"><?php echo $row[0] ?></label>
											<input type="text" name="name" value="<?php echo $row[1] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 5.3em;">
											<input type="text" name="captain" value="<?php echo $row[2] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 10em;">
											<?php 
											header('Content-Type: application/json');
											//print($row[4]); //prints a json
											$account = json_decode($row[4],true); 
											$account = $account['id'];
											//$tmp = JSON.stringify(json_encode($row[4]));
											?>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;"><?php echo $account[0]; ?></label>
											<br>
											<input type="submit" name= "submit" value="Change" class="submit" style="margin-left: 0.9em;">
											<input type="hidden" name="type" value="FleetID">
											<input type="hidden" name="diff" value="<?php echo $row[0] ?>">
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				<?php
				}
			}
			else if ($_POST['type'] == 'FleetID') {
				$query = "SELECT * FROM fleet WHERE ID = '$input'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-none d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;">ID</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em;">Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 7.7em;">Admiral</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Account</label>
											<br>
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 3em;"><?php echo $row[0] ?></label>
											<input type="text" name="name" value="<?php echo $row[1] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 5.3em;">
											<input type="text" name="captain" value="<?php echo $row[2] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 10em;">
											<?php 
											header('Content-Type: application/json');
											//print($row[4]); //prints a json
											$account = json_decode($row[4],true); 
											$account = $account['id'];
											//$tmp = JSON.stringify(json_encode($row[4]));
											?>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;"><?php echo $account[0]; ?></label>
											<br>
											<input type="submit" name= "submit" value="Change" class="submit" style="margin-left: 0.9em;">
											<input type="hidden" name="type" value="FleetID">
											<input type="hidden" name="diff" value="<?php echo $row[0] ?>">

										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form>
				<?php
			}
			else if ($_POST['type'] == 'Account'){
				$query = "SELECT * FROM accounts WHERE ID = '$input'";
				$result= mysqli_query($con,$query);
				$row=mysqli_fetch_row($result); 
			}
			else {
				$method = $_POST['type'];
				$query = "SELECT * FROM users WHERE `$method` LIKE '%$input%'";
				$result= mysqli_query($con,$query);
				if (mysqli_num_rows($result)>1) {
					$array = $result->fetch_all(MYSQLI_NUM);?>
					<form method = "POST">
						<fieldset>
							<div class = "container" id = "Search" >
								<div class = "d-flex-row">
									<div class = "SSearch">
									<?php echo '<label>Search by: </label><select name="input">';
									//echo '<form method="post" id = "select">';
									foreach ($array as $key => $value) {
									//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
									echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
									}
									//echo '</form>';
									$input2 = mysqli_real_escape_string($con, $_POST['input']);
									echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="1">';?>
									</div>
								</div>
							</div>
						</fieldset>
					</form> <?php
				}
				else { 
					$row=mysqli_fetch_row($result); ?>
					<form method="POST">
						<fieldset>
							<div class = "d-none d-lg-none d-xl-block">
								<div class="d-flex justify-content-left">
									<div class = "row" id="DeptRowTwo">
										<div class = "col" style="margin-left: 14em; margin-top: 2em;">
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 6em;">Email</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 4em; height: 2.9em;">Password Reset</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Frist Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Last Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Pirate Name</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;">Account</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 3em; height: 2.9em;">Part of Ship</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 3em; height: 4.3em;">Part of Fleet</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 3em; height: 2.9em;">Leader of Ship</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 3em; height: 4.3em;">Leader of Fleet</label>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em; height: 12.7em;">Account Permission a:Basic, b:Teller, c:Volunteer Coord, d:Land Steward, z:omega</label>
											<br>
											<label class= "dataDis unpressed" style="margin-left: 0.9em; padding-right: 0.2em; padding-left: 0.2em; width: 6em;"><?php echo $row[0] ?></label>
											<input type="checkbox" name="passRest" style="margin-left:  2.25em; margin-right: 2.25em; transform: scale(1.6);" value="<?php echo $temp ?>">
											<input type="text" name="Fname" value="<?php echo $row[3] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 6.5em;">
											<input type="text" name="Lname" value="<?php echo $row[4] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 6.5em;">
											<input type="text" name="Pname" value="<?php echo $row[5] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 6.5em;">
											<?php 
											header('Content-Type: application/json');
											//print($row[4]); //prints a json
											$account = json_decode($row[10],true); 
											$account = $account['id'];
											//$tmp = JSON.stringify(json_encode($row[4]));
											?>
											<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; width: 5em;"><?php echo $account[0]; ?></label>
											<input type="text" name="Ship" value="<?php echo $row[7] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 3.9em;">
											<input type="text" name="Fleet" value="<?php echo $row[6] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 3.9em;">
											<input type="text" name="shipC" value="<?php echo $row[15] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 3.9em;">
											<input type="text" name="fleetC" value="<?php echo $row[16] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 3.9em;">
											<input type="text" name="ackperm" value="<?php echo $row[9] ?>" style="padding-right: 0.2em; padding-left: 0.2em; width: 6.5em;">
											<br>
											<input type="submit" name= "submit" value="Change" class="submit" style="margin-left: 0.9em;">
											<input type="hidden" name="type" value="Username">
											<input type="hidden" name="diff" value="<?php echo $row[0] ?>">

										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</form> <?php
				}
			}
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Change") {
			if ($_POST['type'] == 'FleetID') {
				$name = $_POST['name'];
				$cap = $_POST['captain'];
				$diff = $_POST['diff'];
				$query = "UPDATE fleet SET Name = '$name', Admiral = '$cap' WHERE `fleet`.`ID` = '$diff'";
				$result= mysqli_query($con,$query); ?>
				<div class="d-flex justify-content-center">
					<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em;"><?php echo("Command: ".$query." ran") ?></label> 
				</div><?php
			}
			else if ($_POST['type'] == 'ShipID') {
				$name = $_POST['name'];
				$cap = $_POST['captain'];
				$diff = $_POST['diff'];
				$query = "UPDATE ship SET Name = '$name', Captain = '$cap' WHERE `ship`.`ID` = '$diff'";
				$result= mysqli_query($con,$query); ?>
				<div class="d-flex justify-content-center">
					<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em;"><?php echo("Command: ".$query." ran") ?></label> 
				</div><?php
			}
			else{
				$diff = $_POST['diff'];
				$fname = $_POST['Fname'];
				$lname = $_POST['Lname'];
				$pname = $_POST['Pname'];
				if (isset($_POST['Ship'])){
					$ship = $_POST['Ship'];
					$query = "UPDATE users SET Ship = '$ship' WHERE `users`.`Username` = '$diff'";
					$result= mysqli_query($con,$query);
				}
				else
					$ship = 'NULL';
				if (isset($_POST['shipC'])){
					$shipC = $_POST['shipC'];
					$query = "UPDATE users SET shipC = '$shipC' WHERE `users`.`Username` = '$diff'";
					$result= mysqli_query($con,$query);
				}
				else
					$shipC = NULL;
				if (isset($_POST['Fleet'])){
					$fleet = $_POST['Fleet'];
					$query = "UPDATE users SET Fleet = '$fleet' WHERE `users`.`Username` = '$diff'";
					$result= mysqli_query($con,$query);
				}
				else
					$fleet = 'NULL';
				if (isset($_POST['fleetC'])){
					$fleetC = $_POST['fleetC'];
					$query = "UPDATE users SET fleetC = '$fleetC' WHERE `users`.`Username` = '$diff'";
					$result= mysqli_query($con,$query);
				}
				else
					$fleetC = 'NULL';
				$perm = strtolower($_POST['ackperm']);
				if (isset($_POST['passRest'])) {
					$row = mysqli_fetch_row($resultIn);
					$salt = $row[2];
					$Password = "password";
					$passwordhold = md5($salt.$Password);
					$query = "UPDATE users SET Fname = '$fname', Lname = '$lname', Pname = '$pname', AccountPerm = '$perm', Password = '$passwordhold' WHERE `users`.`Username` = '$diff'";
				}
				else
					$query = "UPDATE users SET Fname = '$fname', Lname = '$lname', Pname = '$pname', AccountPerm = '$perm' WHERE `users`.`Username` = '$diff'";
				$result= mysqli_query($con,$query); ?>
				<div class="d-flex justify-content-center">
					<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em; height: 3em;"><?php echo("Command: ".$query." ran") ?></label> 
				</div><?php
			}
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Launch") {
			$query = $_POST['input'];
			$result= mysqli_query($con,$query); ?>
			<div class="d-flex justify-content-center">
				<label class= "dataDis unpressed" style="padding-right: 0.2em; padding-left: 0.2em;"><?php echo("Command: ".$query." ran") ?></label> 
			</div><?php
		}
		mysqli_close($con);
		?>
	</body>

</html>
