<?php //this validates that the transaction that was subbmitted is a valid transaction.
if ($_POST['Accto']) {
$Accto=$_POST['Accto'];
$temp=explode("-!split!-", $_POST['Accfrom']);
$Accfrom=$temp[0];
//echo $Accfrom;
$trans=$_POST['trans'];

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($trans <= $row[0] && $trans>0){ //checks to see that you have enough money for the transfer and that the transaction is not 0
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$Accto'";
		$resultIn = mysqli_query($con, $queryIn);
		$row2=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)==1){ //checks that the account your tranfering to exists
			$valid=1;
		}
		else{
			$valid=2;
		}
	}
	elseif($trans<$row[0]){
		$valid=0;
	}
}
?>