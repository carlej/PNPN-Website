<?php
include("Connections/req.php");
include 'Connections/convar.php';
if ($_POST['submit'] == "Cancel"){
	echo $_SESSION['hold'];
	$_SESSION['hold']="hold";
	header("Location: /SDN-Website/bank.php");
}
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$Accfrom = mysqli_real_escape_string($con, $_POST['Accfrom']);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	if (($Accto=="" || $trans=="") && $_POST['submit']!="Cancel") {
		header("Location: /SDN-Website/transfer.php");
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($trans <= $row[0] && $trans>0) {
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$Accto'";
		$resultIn = mysqli_query($con, $queryIn);
		$row2=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)!=0) {
			$timeStamp=date("Y/m/d H:m:s");
			$rema = $row[0]-$trans;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$Accfrom'";
			$deduct = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account
			$queryTo = "SELECT Ballance FROM accounts WHERE ID = '$Accto'";
			$resultTo = mysqli_query($con, $queryTo);
			$row3=mysqli_fetch_row($resultTo);
			$addat = $row3[0] + $trans;
			$updateto = "UPDATE accounts SET Ballance = '$addat' WHERE accounts.ID = '$Accto'";
			$deduct = mysqli_query($con, $updateto); //sets the new ballance of the account being transftered into.
			//creates a history of the transaction in the account to
			$queryHistTo="SELECT history FROM accounts WHERE ID = '$Accto'";
			$resultHistTo= mysqli_query($con, $queryHistTo);
			$rowHistTo=mysqli_fetch_row($resultHistTo);
			$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
			$dep=["deposite",$Accfrom,$Accto,$trans];
			$parsed_jsonHistTo[$timeStamp]=$dep;
			$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
			$queryHistTo="UPDATE accounts SET history = '$enco_jsonHistTo' WHERE accounts.ID = '$Accto'";
			$resultHistTo=mysqli_query($con,$queryHistTo);
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Transfer",$Accfrom,$Accto,$trans];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: /SDN-Website/transfer.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
		}
		else{
			//error = "Error that account doesn't exist";
			//echo "<script type='text/javascript'>alert('".$error."');</script>";
			header("Location: /SDN-Website/transfer.php");
		}
	}
	elseif($trans>0){
		//echo "error you don't have enough money";
		header("Location: /SDN-Website/transfer.php");
	}
?>