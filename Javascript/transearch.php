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
		$parsed_json=NULL;
		$parsed_fleet_json=NULL;
		$accnum=NULL;
		$rowShip=mysqli_fetch_row($resultShip);
		$shipNameUnedit=$rowShip[1];
		$shipName=str_replace(' ', '&nbsp;', $shipNameUnedit);
		$parsed_ship_json=json_decode($rowShip[4],true);
		$accnum=$parsed_ship_json['id'];
		$_SESSION['temp']=$accnum[0];
		
		$searchUserName=$row[0];
		
		$_SESSION['nest']=$shipName;
		$_SESSION['multsearch']=array('1');
		$_SESSION['stype']=NULL;
		//$_SESSION['stype']="shipID";
		//$user=$_SESSION['nest'];
		////include "Views/Partials/showAccs.php";
		////include "Views/Partials/showhist.php";
		
		$perm = $_SESSION['perm'];
		mysqli_close($con);
		?><script type="text/javascript">window.location.href='bank.php'</script><?php
		
		////include("Javascript/telltranscript.php");
		//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
		//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Ship".'" /></p></form></html>';
	}
	elseif ($method == "Ship") {//This is to search for ships
		$queryShip = "SELECT * FROM ship WHERE Name LIKE '%$input%'";
		$resultShip= mysqli_query($con,$queryShip);
		$shipName=NULL;
	
		if (mysqli_num_rows($resultShip)>1) { //if there are multiple results this makes a drop down list so that you can pick what one you want
			?>
			<div class = "container" id = "PSSearch">
			<?php
			$array=NULL;
			$array = $resultShip->fetch_all(MYSQLI_NUM);
			$_SESSION['multsearch']=$array;
			$_SESSION['stype']="shipID";
			mysqli_close($con);
			/*
			echo '<form method="POST" id="SearchBy2"><fieldset><label>Select: </label><select name="input">';
			//echo '<form method="post" id = "select">';
			foreach ($array as $key => $value) {//this will desplay the name of each captain as each should be different
				//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
				echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
			}
			//echo '</form>';
			$input2 = mysqli_real_escape_string($con, $_POST['input']);
			
			echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search" ><input type="hidden" name="type" value="shipID"><input type="hidden" name="new" value="new"></fieldset></form>'; ?>
			</div>*/?>
			<script type="text/javascript">window.location.href='bank.php'</script>
		
		<?php 
		}
		elseif (mysqli_num_rows($resultShip)==1) { //returns the one account that was found or selected
			$searched=true;
			$parsed_ship_json=NULL;
			$parsed_json=NULL;
			$parsed_fleet_json=NULL;
			$rowShip=mysqli_fetch_row($resultShip);
			$shipNameUnedit=$rowShip[1];
			$parsed_ship_json=json_decode($rowShip[4],true);
			$accnum=$parsed_ship_json['id'];
			$_SESSION['temp']=$accnum[0];
			
			$shipName=$rowShip[1];
			$_SESSION['shipName']=$input;
			$shipName=str_replace(' ', '&nbsp;', $shipNameUnedit);
			$_SESSION['nest']=$shipName;
			$_SESSION['multsearch']=array('1');
			$_SESSION['stype']=NULL;
			//$user=$_SESSION['nest'];
			//include "Views/Partials/showAccs.php";
			//include "Views/Partials/showhist.php";
			
			$perm = $_SESSION['perm'];
			mysqli_close($con);
			?><script type="text/javascript">window.location.href='bank.php'</script><?php
			
			echo '<script type="text/javascript">searched('.$shipName.');</script>';
			//include("Javascript/telltranscript.php");
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Ship".'" /></p></form></html>';
		}
		else{
			echo '<script type="text/javascript">alert("There are no accounts that match your search!");</script>';
		}
	}
	elseif ($method == "fleetID") {
		$queryFleet = "SELECT * FROM fleet WHERE ID = '$input'";
		$resultFleet= mysqli_query($con,$queryFleet);
		$parsed_ship_json=NULL;
		$parsed_json=NULL;
		$parsed_fleet_json=NULL;
		$rowFleet=mysqli_fetch_row($resultFleet);
		$parsed_fleet_json=json_decode($rowFleet[4],true);
		$accnum=$parsed_fleet_json['id'];
		$_SESSION['temp']=$accnum[0];
		
		$fleetNameUnedit=$rowFleet[1];
		$fleetName=str_replace(' ', '&nbsp;', $fleetNameUnedit);
		$searchUserName=$row[0];
		$_SESSION['nest']=$fleetName;
		$_SESSION['multsearch']=array('1');
		$_SESSION['stype']=NULL;
		//$user=$_SESSION['nest'];
		//include "Views/Partials/showAccs.php";
		//include "Views/Partials/showhist.php";
		
		$perm = $_SESSION['perm'];
		mysqli_close($con);
		?><script type="text/javascript">window.location.href='bank.php'</script><?php
		
		//include("Javascript/telltranscript.php");
		//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
		//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Fleet".'" /></p></form></html>';
	}
	elseif ($method == "Fleet") {
		$queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$input%'";
		$resultFleet= mysqli_query($con,$queryFleet);
		$parsed_ship_json=NULL;
		$parsed_json=NULL;
		$parsed_fleet_json=NULL;
		$fleetName=NULL;
		
		if (mysqli_num_rows($resultFleet)>1) {//if there are multiple results this makes a drop down list so that you can pick what one you want
			?>
			<div class = "container" id = "PSSearch">
			<?php
			$array=NULL;
			$array = $resultFleet->fetch_all(MYSQLI_NUM);
			$_SESSION['multsearch']=$array;
			$_SESSION['stype']="fleetID";
			mysqli_close($con);
			/*
			echo '<form method="POST" id="SearchBy2"><fieldset><label>Select: </label><select name="input">';
			//echo '<form method="post" id = "select">';
			foreach ($array as $key => $value) {
				//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
				echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
			}
			//echo '</form>';
			$input2 = mysqli_real_escape_string($con, $_POST['input']);
			
			echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="fleetID"><input type="hidden" name="new" value="new"></fieldset></form>'; ?>
			</div>*/
			?>
			<script type="text/javascript">window.location.href='bank.php'</script>
		
		<?php
		}
		elseif (mysqli_num_rows($resultFleet)==1) { //returns the one account that was found or selected
			$searched=true;
			$parsed_ship_json=NULL;
			$parsed_json=NULL;
			$parsed_fleet_json=NULL;
			$rowFleet=mysqli_fetch_row($resultFleet);
			$parsed_fleet_json=json_decode($rowFleet[4],true);
			$accnum=$parsed_fleet_json['id'];
			$_SESSION['temp']=$accnum[0];
			
			$fleetNameUnedit=$rowFleet[1];
			$searchUserName=$row[0];
			$fleetName=str_replace(' ', '&nbsp;', $fleetNameUnedit);
			$_SESSION['nest']=$fleetName;
			$_SESSION['multsearch']=array('1');
			$_SESSION['stype']=NULL;
			//$user=$_SESSION['nest'];
			//include "Views/Partials/showAccs.php";
			//include "Views/Partials/showhist.php";
			
			$perm = $_SESSION['perm'];
			mysqli_close($con);
			?><script type="text/javascript">window.location.href='bank.php'</script><?php
			
			echo '<script type="text/javascript">searched('.$fleetName.');</script>';
			//include("Javascript/telltranscript.php");
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."Fleet".'" /></p></form></html>';
		}
		else{
			echo '<script type="text/javascript">alert("There are no accounts that match your search!");</script>';
		}
	}
	else{
		$queryIn = "SELECT * FROM users WHERE `$method` LIKE '%$input%'";
		$resultIn = mysqli_query($con, $queryIn);

		if (mysqli_num_rows($resultIn)>1) {//if there are multiple results this makes a drop down list so that you can pick what one you want
			?>
			<div class = "container" id = "PSSearch">
			<?php
			$array = NULL;
			$array = $resultIn->fetch_all(MYSQLI_NUM);
			$_SESSION['multsearch']=$array;
			$_SESSION['nstype']=$method;
			mysqli_close($con);
			/*
			echo '<form method="POST" id="SearchBy2"><fieldset><label>Select: </label><select name="input">';
			//echo '<form method="post" id = "select">';
			foreach ($array as $key => $value) {
				//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
				echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
			}
			//echo '</form>';
			$input2 = mysqli_real_escape_string($con, $_POST['input']);
			echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="new"></fieldset></form>'; ?>
			</div>*/
			?>
			<script type="text/javascript">window.location.href='bank.php'</script>
		
		<?php
		}
		else if (mysqli_num_rows($resultIn)==1) { //returns the one account that was found or selected
			$searched=true;
			$row = mysqli_fetch_row($resultIn);
			$username=$row[0];
			$nameUnedit=NULL;
			$fleetName=NULL;
			$shipName=NULL;
			$parsed_ship_json=NULL;
			$parsed_json=NULL;
			$parsed_fleet_json=NULL;
			if ($row[5]!=NULL) {
				$nameUnedit=$row[5];
			}
			else{
				$nameUnedit="{$row[3]} {$row[4]}";;
			}
			$name=str_replace(' ', '&nbsp;', $nameUnedit);
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row1=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row1[0], true);
//				$parsed_jsonid=$parsed_json;
			$accnum = $parsed_json['id'];
			$_SESSION['temp']=$accnum[0];
			$searchUserName=$row[0];
			$_SESSION['nest']=$name;
			$_SESSION['multsearch']=array('1');
			$_SESSION['stype']=NULL;
			//$user=$_SESSION['nest'];
			//include "Views/Partials/showAccs.php";
			//include "Views/Partials/showhist.php";
			
			$perm = $_SESSION['perm'];
			mysqli_close($con);
			?><script type="text/javascript">window.location.href='bank.php'</script><?php
			

			//include("Javascript/telltranscript.php");
			//This was commented out as I was told to not allow multiple accounts and it was easer to just remove the one button that made them then to remove the ability to have multiple I'm leaving it as it still functions and so could be used later if wanted.
			//echo '<html><form name="addacc" method="POST" action="Javascript/makeacc.php"><p><input type="submit" name="Add Account" value="Add Account" /><input type="hidden" name="user" value="'.$searchUserName.'" /><input type="hidden" name="type" value="'."norm".'" /></p></form></html>';
		}
		else{
			echo '<script type="text/javascript">alert("There are no accounts that match your search!");</script>';
		}
	}
?>