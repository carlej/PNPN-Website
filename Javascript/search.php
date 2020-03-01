<?php //this is the search file most of the searches are the same but with small changes to them to change what is searched but all function the same.
 	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$method = $_POST['type'];
	$input = mysqli_real_escape_string($con, $_POST['input']);
	if ($method=="shipID"){//This is an unused search method as I was not sure what i would be searching by and is one of the easy ones to make
		$queryShip = "SELECT * FROM ship WHERE ID = '$input'";
		$resultShip= mysqli_query($con,$queryShip);
		$parsed_ship_json=NULL;
		$rowShip=mysqli_fetch_row($resultShip);
		$shipName=$rowShip[1];
		$parsed_ship_json=json_decode($rowShip[4],true);
		$parsed_ship_json=$parsed_ship_json['id'];
		$searchUserName=$row[0];
		
		$_SESSION['hold']=$input;
		$_SESSION['stype']="shipID";
		//$user=$_SESSION['hold'];?>
		<div class = "container">
				<div class = "row">
					<?php include "Javascript/telltranscript.php"; ?>
				</div>
				<div class = "row">
					<?php include "Views/Partials/showAccs.php"; ?>
				</div>
				<div class = "row">
					<?php include "Views/Partials/showhist.php"; ?>
				</div>
		</div>

		<?php
		mysqli_close($con);
		$perm = $_SESSION['perm'];
		$_SERVER["REQUEST_METHOD"]=NULL;
		//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
		//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Ship".'" /></p></form></html>';
	}
	elseif ($method == "Ship") {//This is to search for ships
		$queryShip = "SELECT * FROM ship WHERE Name LIKE '%$input%'";
		$resultShip= mysqli_query($con,$queryShip);
		$shipName=NULL;
		if (mysqli_num_rows($resultShip)>1) { //if there are multiple results this makes a drop down list so that you can pick what one you want
			$array=NULL;
			$array = $resultShip->fetch_all(MYSQLI_NUM);?>
			<form method = "POST">
				<fieldset>
					<div class = "container" id = "Search">
						<div class = "d-flex-row">
							<div class = "SSearch">
							<?php echo '<label>Search by: </label><select name="input">';
								//echo '<form method="post" id = "select">';
							foreach ($array as $key => $value) {//this will display the name of each captain as each should be different
							//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
							echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
							}
							//echo '</form>';
							$input2 = mysqli_real_escape_string($con, $_POST['input']);
							$_SESSION['stype']="shipID";
							echo '</select><label for="input"></label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="shipID"><input type="hidden" name="new" value="1">';?>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		<?php }
		elseif (mysqli_num_rows($resultShip)==1) { //returns the one account that was found or selected
			$rowShip=mysqli_fetch_row($resultShip);
			$shipName=$rowShip[1];
			$parsed_ship_json=json_decode($rowShip[4],true);
			$parsed_ship_json=$parsed_ship_json['id'];
			$shipName=$rowShip[1];
			$_SESSION['hold']=$input;
			$_SESSION['stype']="shipID";
			//$user=$_SESSION['hold']; ?>
			<div class = "container">
					<div class = "row">
						<?php include "Javascript/telltranscript.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showAccs.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showhist.php"; ?>
					</div>
			</div>
			<?php
			mysqli_close($con);
			$perm = $_SESSION['perm'];
			$_SERVER["REQUEST_METHOD"]=NULL;
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Ship".'" /></p></form></html>';
		}
		else{
			echo '<div class="container" id = "NoneFound">
						There are no accounts that match that search!
				</div>';
		}
	}
	elseif ($method == "fleetID") {
		$queryFleet = "SELECT * FROM fleet WHERE ID = '$input'";
		$resultFleet= mysqli_query($con,$queryFleet);
		$parsed_fleet_json=NULL;
		$rowFleet=mysqli_fetch_row($resultFleet);
		$parsed_fleet_json=json_decode($rowFleet[4],true);
		$parsed_fleet_json=$parsed_fleet_json['id'];
		$fleetName=$rowFleet[1];
		$searchUserName=$row[0];
		$_SESSION['hold']=$input;
		$_SESSION['stype']="fleetID";
		//$user=$_SESSION['hold']; ?>
		<div class = "container">
				<div class = "row">
					<?php include "Javascript/telltranscript.php"; ?>
				</div>
				<div class = "row">
					<?php include "Views/Partials/showAccs.php"; ?>
				</div>
				<div class = "row">
					<?php include "Views/Partials/showhist.php"; ?>
				</div>
		</div>
		<?php
		mysqli_close($con);
		$perm = $_SESSION['perm'];
		$_SERVER["REQUEST_METHOD"]=NULL;
		//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
		//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Fleet".'" /></p></form></html>';
	}
	elseif ($method == "Fleet") {
		$queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$input%'";
		$resultFleet= mysqli_query($con,$queryFleet);
		$parsed_fleet_json=NULL;
		$fleetName=NULL;
		if (mysqli_num_rows($resultFleet)>1) {//if there are multiple results this makes a drop down list so that you can pick what one you want
			$array=NULL;
			$array = $resultFleet->fetch_all(MYSQLI_NUM);?>
			<form method = "POST">
				<fieldset>
					<div class = "container" id = "Search">
						<div class = "d-flex-row">
							<div class = "SSearch">
							<?php echo '<label>Search by: </label><select name="input">';
								//echo '<form method="post" id = "select">';
							foreach ($array as $key => $value) {
								//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
							echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
							}
							//echo '</form>';
							$input2 = mysqli_real_escape_string($con, $_POST['input']);
							$_SESSION['stype']="fleetID";
							echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="fleetID"><input type="hidden" name="new" value="1">';?>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		<?php }
		elseif (mysqli_num_rows($resultFleet)==1) { //returns the one account that was found or selected
			$rowFleet=mysqli_fetch_row($resultFleet);
			$parsed_fleet_json=json_decode($rowFleet[4],true);
			$parsed_fleet_json=$parsed_fleet_json['id'];
			$fleetName=$rowFleet[1];
			$searchUserName=$row[0];
			$_SESSION['hold']=$input;
			$_SESSION['stype']="fleetID";
			//$user=$_SESSION['hold']; ?>
			<div class = "container">
					<div class = "row">
						<?php include "Javascript/telltranscript.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showAccs.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showhist.php"; ?>
					</div>
			</div>
			<?php
			mysqli_close($con);
			$perm = $_SESSION['perm'];
			$_SERVER["REQUEST_METHOD"]=NULL;
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Fleet".'" /></p></form></html>';
		}
		else{
			echo '<div class="container" id = "NoneFound">
						There are no accounts that match that search!
				</div>';
		}
	}
	else{
		$queryIn = "SELECT * FROM users WHERE `$method` LIKE '%$input%'";
		$resultIn = mysqli_query($con, $queryIn);
		if (mysqli_num_rows($resultIn)>1) {//if there are multiple results this makes a drop down list so that you can pick what one you want
			$array = NULL;
			$array = $resultIn->fetch_all(MYSQLI_NUM);?>
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
			</form>
		<?php }
		else if (mysqli_num_rows($resultIn)==1) { //returns the one account that was found or selected
			$row = mysqli_fetch_row($resultIn);
			$username=$row[0];
			$name=NULL;
			$fleetName=NULL;
			$shipName=NULL;
			
			
			
			
			if ($row[5]!=NULL) {
				$name=$row[5];
			}
			else{
				$name=$row[3].' '.$row[4];
			}
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row1=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row1[0], true);
//				$parsed_jsonid=$parsed_json;
			$parsed_json = $parsed_json['id'];
			$searchUserName=$row[0];
			$parsed_ship_json=NULL;
			$parsed_fleet_json=NULL;
			if ($row[7]!=NULL) {
				$queryShip="SELECT * FROM ship WHERE ID = '$row[7]'";
				$resultShip= mysqli_query($con,$queryShip);
				$rowShip=mysqli_fetch_row($resultShip);
				$shipName=$rowShip[1];
				$parsed_ship_json=json_decode($rowShip[4],true);
				$parsed_ship_json=$parsed_ship_json['id'];
			}
			if ($row[6]!=NULL){
				$queryFleet="SELECT * FROM fleet WHERE ID = '$row[6]'";
				$resultFleet= mysqli_query($con,$queryFleet);
				$rowFleet=mysqli_fetch_row($resultFleet);
				$fleetName=$rowFleet[1];
				$parsed_fleet_json=json_decode($rowFleet[4],true);
				$parsed_fleet_json=$parsed_fleet_json['id'];
			}
			$_SESSION['hold']=$username;
			$_SESSION['stype']='Username';
			//$user=$_SESSION['hold']; ?>
			<div class = "container">
					<div class = "row">
						<?php include "Javascript/telltranscript.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showAccs.php"; ?>
					</div>
					<div class = "row">
						<?php include "Views/Partials/showhist.php"; ?>
					</div>
			</div>
			<?php
			mysqli_close($con);
			$perm = $_SESSION['perm'];
			$_SERVER["REQUEST_METHOD"]=NULL;
			
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."norm".'" /></p></form></html>';
		}
		else{
			echo '<div class="container" id = "NoneFound">
						There are no accounts that match that search!
				</div>';
		}
	}
?>