<?php
include("Connections/req.php");
include 'Connections/convar.php';
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$a=true;
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$type = mysqli_real_escape_string($con, $_POST['type']);
	do{
		srand(time());
		$id=rand(100000000,999999999);
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
		$resultIn = mysqli_query($con, $queryIn);
//		echo $resultIn;
		$row=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)==0) {
			$a=false;
			if ($type=="norm") {
				$queryIn = "SELECT Accounts FROM users WHERE Username = '$user'";
			}
			elseif ($type=="Ship") {
				$queryIn = "SELECT Accounts FROM ship WHERE ID = '$user'";
			}
			elseif ($type=="Fleet") {
				$queryIn = "SELECT Accounts FROM fleet WHERE ID = '$user'";
			}
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
//			$parsed_json = $parsed_json['id'];
//			$accs="{\"id\": [";
//			foreach($parsed_json as $value)
//			{
//				$accs.=$value . ", ";
//			}
//			$accs=$accs.$id."]}";
			$num=sizeof($parsed_json['id']);
			$parsed_json['id'][$num]=$id;
//			echo $parsed_json[$num];
//			$temp="{\"id\":".$parsed_json."]}";
			$add=json_encode($parsed_json);
			$insert = "INSERT INTO accounts (ID) VALUES ('$id')";
			$inResult = mysqli_query($con, $insert); //Updates the DB with the new account
			if ($type=="norm") {
				$update = "UPDATE users SET Accounts = '$add' WHERE users.Username = '$user'";
			}
			elseif ($type=="Ship") {
				$update = "UPDATE ship SET Accounts = '$add' WHERE ID = '$user'";
			}
			elseif ($type=="Fleet") {
				$update = "UPDATE fleet SET Accounts = '$add' WHERE ID = '$user'";
			}
			echo $update;
			$inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
			//header("Location: /SDN-Website/teller.php"); //refresh the page to disply the new account
		}
		else
			$a=true;
	}while($a);
	?>