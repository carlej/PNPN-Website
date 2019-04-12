<?php
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$a=true;
	do{
		srand(time());
		$id=rand(100000000,999999999);
		//echo $id;
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
		$resultIn = mysqli_query($con, $queryIn);
		$row=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)==0) {
			$a=false;
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];
			$accs="{\"id\": [";
			foreach($parsed_json as $value)
			{
				$accs.=$value . ", ";
			}
			$accs=$accs.$id."]}";
			$insert = "INSERT INTO accounts (ID) VALUES ('$id')";
			$inResult = mysqli_query($con, $insert); //Updates the DB with the new account
			$update = "UPDATE users SET Accounts = '$accs' WHERE users.Username = '$username'";
			$inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
			header("Location: /SDN-Website/bank.php"); //refresh the page to disply the new account
		}
		else
			$a=true;
	}while($a);
	?>