<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit") {
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
				foreach ($array as $key => $value) {
					echo '<p><input type="submit" name="selection" value="'.$value[0].'" /></p>';
				}

				//include "Javascript/multResult.php";
			}
			else if (mysqli_num_rows($resultIn)==1) {
				$row = mysqli_fetch_row($resultIn);
				$queryIn = "SELECT Accounts FROM users WHERE Username = '$row[0]'";
				$resultIn = mysqli_query($con, $queryIn);
				$row=mysqli_fetch_row($resultIn);
				$parsed_json = json_decode($row[0], true);
				$parsed_json = $parsed_json['id'];
				include "Views/Partials/showAccs.php";
			}
			else{
				echo "There are no accounts that match that search. Search is case sensitive";
			}
		}
	}
	else{
		//code
	} mysqli_close($con);
 } ?>