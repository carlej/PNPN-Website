<?php
 	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$method = $_POST['type'];
	$input = mysqli_real_escape_string($con, $_POST['input']);
	if ($method!="ID") {
		if ($method == "Ship") {
			# code...
		}
		else if ($method == "Fleet") {
			# code...
		}
		else{
			$queryIn = "SELECT * FROM users WHERE `$method` = '$input'";
			$resultIn = mysqli_query($con, $queryIn);
			$array = NULL;
			if (mysqli_num_rows($resultIn)>1) {
				$option=NULL;
				$array = $resultIn->fetch_all(MYSQLI_NUM);
				echo '<form method="POST" id="search"><fieldset><label>Search by:</label><select name="input">';
				//echo '<form method="post" id = "select">';
				foreach ($array as $key => $value) {
					//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
					echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
				}
				//echo '</form>';
				$input2 = mysqli_real_escape_string($con, $_POST['input']);
				echo '</select><label for="input">:</label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="new"></fieldset></form>';
			
			}
			else if (mysqli_num_rows($resultIn)==1) {
				$row = mysqli_fetch_row($resultIn);
				$queryIn = "SELECT Accounts FROM users WHERE Username = '$row[0]'";
				$resultIn = mysqli_query($con, $queryIn);
				$row1=mysqli_fetch_row($resultIn);
				$parsed_json = json_decode($row1[0], true);
//				$parsed_jsonid=$parsed_json;
				$parsed_json = $parsed_json['id'];
				$searchUserName=$row[0];
				$parsed_ship_json=NULL;
				$parsed_fleet_json=NULL;
				if ($row[7]!=NULL) {
					$queryShip= "SELECT Accounts FROM ship WHERE ID = '$row[7]'";
					$resultShip = mysqli_query($con, $queryShip);
					$rowShip=mysqli_fetch_row($resultShip);
					$parsed_ship_json=json_decode($rowShip[0],true);
					$parsed_ship_json=$parsed_ship_json['id'];
				}
				if ($row[6]!=NULL){
					$queryFleet= "SELECT Accounts FROM fleet WHERE ID = '$row[6]'";
					$resultFleet = mysqli_query($con, $queryFleet);
					$rowFleet=mysqli_fetch_row($resultFleet);
					$parsed_fleet_json=json_decode($rowFleet[0],true);
					$parsed_fleet_json=$parsed_fleet_json['id'];
				}
				$_SESSION['hold']=$searchUserName;
				//$user=$_SESSION['hold'];
				include "Views/Partials/showAccs.php";
				include "Views/Partials/showhist.php";
				mysqli_close($con);
				$perm = $_SESSION['perm'];
				$_SERVER["REQUEST_METHOD"]=NULL;
				include("Javascript/telltranscript.php");
				echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /></p></form></html>';
			}
			else{
				echo "There are no accounts that match that search. Search is case sensitive";
			}
		}
	}
	else{
		//this may not be a good idea since it could force me to loop through all the people at the event and ships and fleets causing a massive slowdown and causing a high amount of server logic
		//recomind findign accounts by other methods so that we can varafiy that the person has access to the account given.
		//for finding an account by account number
	}
//	if ($_SERVER["REQUEST_METHOD"] == "post") {
//		echo "here";
//		foreach ($array as $key => $value) {
//			if($value[0] == $_POST['submit']){
//				$resultIn=$value;
//			}
//		}
//	$row = mysqli_fetch_row($resultIn);
//	echo $row[0];
//	echo "here";
//	}

//	mysqli_close($con);
?>