<?php //this file is to make a transaction for more comments see tellmaketran.php these files are fundimentally the same but with small changes as eventually the teller may add who the teller was to each transaction so as to track who does what action.
include("Connections/req.php");
include 'Connections/convar.php';
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$temp=explode("-!split!-", $_POST['Accfrom']);
	$Accfrom = mysqli_real_escape_string($con, $temp[0]);
	$Accfrom = mysqli_real_escape_string($con, $_POST['Accfrom']);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	//$user=$_SESSION['username'];
	if (($Accto=="" || $trans=="") && $_POST['submit']!="Cancel") {
		//header("Location: /PNPN-Website/transfer.php");
		header("Location: /PNPN-Website/bank.php");
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($trans <= $row[0] && $trans>0) { //makes it so that it doesnt do a transaction thats 0
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$Accto'";
		$resultIn = mysqli_query($con, $queryIn);
		$row2=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)!=0) {
			date_default_timezone_set('Etc/GMT+8');
			$timeStamp=date('Y/m/d h:i:s A'); //this is a time stamp that is placed on the transaction in the history so that we know when it happened.
			$rema = $row[0]-$trans;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$temp[0]'";
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
			$dep=["Transfered",$temp[1],$Accto,$trans];
			$parsed_jsonHistTo[$timeStamp]=$dep;
			$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
			$queryHistTo="UPDATE accounts SET history = '$enco_jsonHistTo' WHERE accounts.ID = '$Accto'";
			$resultHistTo=mysqli_query($con,$queryHistTo);
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$temp[0]'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Transfered",$temp[1],$Accto,$trans];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$temp[0]'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			//header("Location: /PNPN-Website/transfer.php");//refreshes page to reflect new ballance
			header("Location: /PNPN-Website/bank.php");
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
		}
		else{
			//error = "Error that account doesn't exist";
			//echo "<script type='text/javascript'>alert('".$error."');</script>";
			//header("Location: /PNPN-Website/transfer.php");
			header("Location: /PNPN-Website/bank.php");
		}
	}
	elseif($trans>0){
		//echo "error you don't have enough money";
		//header("Location: /PNPN-Website/transfer.php");
		header("Location: /PNPN-Website/bank.php");
	}
?>
