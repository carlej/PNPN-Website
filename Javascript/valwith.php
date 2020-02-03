<?php //this is the file to check if you have enough money for the withdraw. It wont allow a teller to say they gave more money then they have.
if ($_POST['to']) {
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
	if($trans>0){
//		$error = "error you don't have enough money";
//		echo '<script type="text/javascript">alert("text");</script>';
//		echo "false";
		//header("Location: /PNPN-Website/transfer.php");
		echo json_encode(array("0"=>false,"1"=>"Error you don't have enough money"));
	}
}
?>