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
				echo '<form method="post" id = "select">';
				foreach ($array as $key => $value) {
					echo '<p><input type="button" name="selection" value="'.$value[0].'" /></p>';
				}
				echo '</form>';
				if ($_SERVER["REQUEST_METHOD"] == "post") {
					echo "here";
					foreach ($array as $key => $value) {
						if($value[0] == $_POST['selection']){
							$resultIn=$value;
						}
					}
				}
			}
			else if (mysqli_num_rows($resultIn)==1) {
				$row = mysqli_fetch_row($resultIn);
				$queryIn = "SELECT Accounts FROM users WHERE Username = '$row[0]'";
				$resultIn = mysqli_query($con, $queryIn);
				$row1=mysqli_fetch_row($resultIn);
				$parsed_json = json_decode($row1[0], true);
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
	}
	mysqli_close($con);
?>