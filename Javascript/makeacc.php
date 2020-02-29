<?php
//This file is used the make new accounts
include("Connections/req.php");
include 'Connections/convar.php';
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$a=true;
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$type = mysqli_real_escape_string($con, $_POST['type']);

	//This is the start of the loop that keeps generating account numbers till it makes one that does not exist already then stores the new account in the database
	do{
		srand(time());
		$id=rand(100000000,999999999);  //creates the account number that is used at the key to find each account
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
		$resultIn = mysqli_query($con, $queryIn); 
//		echo $resultIn;
		$row=mysqli_fetch_row($resultIn);
		//this is the case that checks to see if the new account is new. Then stores and creates the new account.
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
			$num=sizeof($parsed_json['id']);
			$parsed_json['id'][$num]=$id;
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
			//header("Location: teller.php"); //refresh the page to disply the new account
		}
		else
			$a=true; //statment to keep looping as the account number already existed
	}while($a);
	?>