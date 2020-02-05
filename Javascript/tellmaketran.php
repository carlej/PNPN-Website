<?php //this file is so that a teller can make a transaction
//It is mostly the same as the other transaction file but changed slightly to make it function for a teller
include("Connections/req.php");
include 'Connections/convar.php';
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$Accfrom = mysqli_real_escape_string($con, $_POST['Accfrom']);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	$tellerTemp=$_SESSION['username'];
	$queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
	$resultInTeller = mysqli_query($con, $queryInTeller);
	$rowTeller=mysqli_fetch_row($resultInTeller);
	$space=' ';
	$teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";
	if (($Accto=="" || $trans=="") && $_POST['submit']!="Cancel") {
		header("Location: /PNPN-Website/teller.php");
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($trans <= $row[0] && $trans>0) { //basic error handling
		$queryIn = "SELECT ID FROM accounts WHERE ID = '$Accto'";
		$resultIn = mysqli_query($con, $queryIn);
		$row2=mysqli_fetch_row($resultIn);
		if (mysqli_num_rows($resultIn)!=0) {
			date_default_timezone_set('Etc/GMT+8'); //changes timezone for date to pacific time from GMT
			$timeStamp=date('Y/m/d h:i:s A'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
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


			//I want to add a part into this that says what teller did the transaction but am not sure if this is something that we would want going forward and so have not implumented this yet

			//This adds a new entry into the JSON file that is used to store the history of each account

			//currently it uses the account numbers for this info. I was trying to phase out account numbers and have this display the name of the account holder but this is a work in progress.
			$queryHistTo="SELECT history FROM accounts WHERE ID = '$Accto'";
			$resultHistTo= mysqli_query($con, $queryHistTo);
			$rowHistTo=mysqli_fetch_row($resultHistTo);
			$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
			$dep=["Transfered",$Accfrom,$Accto,$trans,$teller];
			$parsed_jsonHistTo[$timeStamp]=$dep;
			$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
			$queryHistTo="UPDATE accounts SET history = '$enco_jsonHistTo' WHERE accounts.ID = '$Accto'";
			$resultHistTo=mysqli_query($con,$queryHistTo);
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Transfered",$Accfrom,$Accto,$trans,$teller];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: /PNPN-Website/teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
		}
		else{
			//error = "Error that account doesn't exist";
			//echo "<script type='text/javascript'>alert('".$error."');</script>";
			//header("Location: /PNPN-Website/transfer.php");
		}
	}
	elseif($trans>0){
		//echo "error you don't have enough money";
		header("Location: /PNPN-Website/teller.php");
	}
?>
