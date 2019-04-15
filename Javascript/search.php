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
					echo '<option value="'.$value[0].'">'.$value[0].'</option>';
				}
				//echo '</form>';
				$input2 = mysqli_real_escape_string($con, $_POST['input']);
				echo '</select><label for="input">:</label><input type="submit" name= "submit" value="Submit"><input type="hidden" name="type" value="Username"></fieldset></form>';
			
			}
			else if (mysqli_num_rows($resultIn)==1) {
				$row = mysqli_fetch_row($resultIn);
				$queryIn = "SELECT Accounts FROM users WHERE Username = '$row[0]'";
				$resultIn = mysqli_query($con, $queryIn);
				$row1=mysqli_fetch_row($resultIn);
				$parsed_json = json_decode($row1[0], true);
				$parsed_json = $parsed_json['id'];
				$searchUserName=$row[0];
				$_SESSION['hold']=$searchUserName;
				include "Views/Partials/showAccs.php";
				mysqli_close($con);
				$perm = $_SESSION['perm'];
				$_SERVER["REQUEST_METHOD"]=NULL;
				include("Javascript/transcript.php");
			}
			else{
				echo "There are no accounts that match that search. Search is case sensitive";
			}
		}
	}
	else{
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