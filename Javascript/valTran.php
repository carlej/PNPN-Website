<?php
if ($_POST['to']) {
$Accto=$_POST['to'];
$Accfrom=$_POST['from'];
$trans=$_POST['tra'];

include 'Connections/convar.php';
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($trans <= $row[0] && $trans>0){
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$Accto'";
		$resultIn = mysqli_query($con, $queryIn);
		$row2=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)!=0){
			echo json_encode(array("0"=>true,"1"=>""));
//			echo "true";
		}
		else{
//			$error = "Error that account doesn't exist";
//			echo '<script type="text/javascript">alert("text");</script>';
//			echo "false";
			echo json_encode(array("0"=>false,"1"=>"Error that account doesn't exist"));
		}
	}
	elseif($trans>0){
//		$error = "error you don't have enough money";
//		echo '<script type="text/javascript">alert("text");</script>';
//		echo "false";
		//header("Location: /PNPN-Website/transfer.php");
		echo json_encode(array("0"=>false,"1"=>"Error you don't have enough money"));
	}
}
?>