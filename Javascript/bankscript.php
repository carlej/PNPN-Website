<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	do{
		$a=true;
		srand(time());
		$id=rand(100000000,999999999);
		//echo $id;
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
		$resultIn = mysqli_query($con, $queryIn);
		$row=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)==0) {
			$a=true;
			$queryIn = "SELECT Accounts FROM users WHERE Username = '$username'";
			$resultIn = mysqli_query($con, $queryIn);
			$row=mysqli_fetch_row($resultIn);
			$parsed_json = json_decode($row[0], true);
			$parsed_json = $parsed_json['id'];
			$nums=0;
			$accs=NULL;
			foreach($parsed_json as $value)
			{
				$accs.=$value . ", ";
				$nums++;
			}
			echo $accs;
			//INSERT INTO `accounts` (`ID`, `Ballance`) VALUES ('5', '3');
			//UPDATE `users` SET `Accounts` = '{\"id\": [1, 2, 5]}' WHERE `users`.`Username` = 'user';
			$a=false;
		}
		else
			$a=false;
	}while($a);
}
?>
<form method="post" id= addaccount>
	<p>
		<input type = "submit" value = "Add Account"?>
	</p>
</form>
