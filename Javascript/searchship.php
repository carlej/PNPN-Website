<?php
 	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$method = $_POST['type'];
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$input = mysqli_real_escape_string($con, $_POST['input']);
	$queryIn = "SELECT * FROM users WHERE `$method` = '$input'";
	$resultIn = mysqli_query($con, $queryIn);
	if (mysqli_num_rows($resultIn)>1) {
		$array = NULL;
		$array = $resultIn->fetch_all(MYSQLI_NUM);
		echo '<form method="POST" id="search"><fieldset><label>Search by:</label><select name="input">';
		foreach ($array as $key => $value) {
			echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
		}
		$input2 = mysqli_real_escape_string($con, $_POST['input']);
		echo '</select><label for="input">:</label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="new"><input type="hidden" class="required" value="'.$name.'"name="name" id="name"></fieldset></form>';
		
	}
	else if (mysqli_num_rows($resultIn)==1) {
		$row = mysqli_fetch_row($resultIn);
		$searchUserName=$row[0];
		$_SESSION['hold']=$searchUserName;
		$_SESSION['stype']=$name;
		mysqli_close($con);
		$perm = $_SESSION['perm'];
		$_SERVER["REQUEST_METHOD"]=NULL;
		header("Location: /PNPN-Website/addShip.php");
	}
	else{
		echo "There are no accounts that match that search. Search is case sensitive";
	}


?>