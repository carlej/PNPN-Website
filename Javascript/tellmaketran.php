<?php //this file is so that a teller can make a transaction
//It is mostly the same as the other transaction file but changed slightly to make it function for a teller
include("Connections/req.php");
include 'Connections/convar.php';
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}

	if ($_POST['delim']=='tran') {
	$temp=explode("-!split!-", $_POST['Accfrom']);
	$tempfromname = $temp[1];
	$string = htmlentities($tempfromname, null, 'utf-8');
	$tempfrom = str_replace("&nbsp;", " ", $string);
	$namefrom = html_entity_decode($tempfrom);
	$Accfrom = mysqli_real_escape_string($con, $temp[0]);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$transTemp = mysqli_real_escape_string($con, $_POST['trans']);
	$trans = (int) $transTemp;
	$tranNotes = $_POST['tranNotes'];
	$tempname = mysqli_real_escape_string($con, $_POST['name']);
	$string = htmlentities($tempname, null, 'utf-8');
	$tempname = str_replace("&nbsp;", " ", $string);
	$tempname2 = str_replace("\\", "", $tempname);
	$name = html_entity_decode($tempname2);
	$tellerTemp=$_SESSION['username'];
	$queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
	$resultInTeller = mysqli_query($con, $queryInTeller);
	$rowTeller=mysqli_fetch_row($resultInTeller);
	$space=' ';
	$teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";
	if (($Accto=="" || $trans=="") && $_POST['submit']!="Cancel") {
		header("Location: ../teller.php");
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
			$timeStamp=date('m/d/Y H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
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

			//This adds a new entry into the JSON file that is used to store the history of each account

			//currently it uses the account numbers for this info. I was trying to phase out account numbers and have this display the name of the account holder but this is a work in progress.
			//start audit
			$AuditHist="SELECT history FROM accounts WHERE ID = '330425394'";
			$AuditHist= mysqli_query($con, $AuditHist);		
			$AuditHist=mysqli_fetch_row($AuditHist);
			$Audit_jsonHist=json_decode($AuditHist[0],true);
			$Audittran=["Transfered",$namefrom,$name,$teller,$trans,$tranNotes];
			$Audit_jsonHist[$timeStamp]=$Audittran;
			$Audit_jsonHist=json_encode($Audit_jsonHist);
			$Audit = mysqli_real_escape_string($con, $Audit_jsonHist);
			$AuditHist="UPDATE accounts SET history = '$Audit' WHERE accounts.ID = '330425394'";
			$AuditHistFrom=mysqli_query($con,$AuditHist);
			//end audit
			$queryHistTo="SELECT history FROM accounts WHERE ID = '$Accto'";
			$resultHistTo= mysqli_query($con, $queryHistTo);
			$rowHistTo=mysqli_fetch_row($resultHistTo);
			$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
			$dep=["Transfered",$namefrom,$name,$teller,$trans,$tranNotes];
			$parsed_jsonHistTo[$timeStamp]=$dep;
			$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
			$NOSPECIALCHARACERSto = mysqli_real_escape_string($con, $enco_jsonHistTo);
			$queryHistTo="UPDATE accounts SET history = '$NOSPECIALCHARACERSto' WHERE accounts.ID = '$Accto'";
			$resultHistTo=mysqli_query($con,$queryHistTo);
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Transfered",$namefrom,$name,$teller,$trans,$tranNotes];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$NOSPECIALCHARACERS = mysqli_real_escape_string($con, $enco_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$NOSPECIALCHARACERS' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: ../teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
			$_SESSION['nest']="hold";
			$_SESSION['temp']="temp";
			$_SESSION['multsearch']=array('1');
			$_SESSION['nstype']=NULL;
		}
		else{
			//error = "Error that account doesn't exist";
			//echo "<script type='text/javascript'>alert('".$error."');</script>";
			//header("Location: transfer.php");
		}
	}
	elseif($trans>0){
		//echo "error you don't have enough money";
		header("Location: ../teller.php");
	}
	}
	else if ($_POST['delim']=='dept') {
		$temp=explode("-!split!-", $_POST['Accfrom']);
		$tempfromname = $temp[1];
	$string = htmlentities($tempfromname, null, 'utf-8');
	$tempfrom = str_replace("&nbsp;", " ", $string);
	$namefrom = html_entity_decode($tempfrom);
	$Accfrom = mysqli_real_escape_string($con, $temp[0]);
	$deptsTemp = mysqli_real_escape_string($con, $_POST['depts']);
	$depts = (int) $deptsTemp;
	$deptNotes = $_POST['deptNotes'];
	$tellerTemp=$_SESSION['username'];
	$queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
	$resultInTeller = mysqli_query($con, $queryInTeller);
	$rowTeller=mysqli_fetch_row($resultInTeller);
	$space=' ';
	$teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";

	if (($depts=="") && $_POST['submit']!="Cancel") {
		header("Location: ../teller.php");
	}
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	echo $teller;
	if ($depts>0) { //basic error handling
			date_default_timezone_set('Etc/GMT+8'); //changes timezone for date to pacific time from GMT
			$timeStamp=date('m/d/Y H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
			$rema = $row[0]+$depts;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE ID = '$Accfrom'";
			$addition = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account

			//This adds a new entry into the JSON file that is used to store the history of each account

			
			
			//start audit
			$AuditHist="SELECT history FROM accounts WHERE ID = '330425394'";
			$AuditHist= mysqli_query($con, $AuditHist);		
			$AuditHist=mysqli_fetch_row($AuditHist);
			$Audit_jsonHist=json_decode($AuditHist[0],true);
			$Audittran=["Deposited",$namefrom,'0',$teller,$depts,$deptNotes,'0'];
			$Audit_jsonHist[$timeStamp]=$Audittran;
			$Audit_jsonHist=json_encode($Audit_jsonHist);
			$Audit = mysqli_real_escape_string($con, $Audit_jsonHist);
			$AuditHist="UPDATE accounts SET history = '$Audit' WHERE accounts.ID = '330425394'";
			$AuditHistFrom=mysqli_query($con,$AuditHist);
			//end audit
			//creates history in the account making the deposited
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Deposited",$namefrom,'0',$teller,$depts,$deptNotes,'0'];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$NOSPECIALCHARACERS = mysqli_real_escape_string($con, $enco_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$NOSPECIALCHARACERS' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: ../teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
	}
	}
	else if ($_POST['delim']=='with') {
	$temp=explode("-!split!-", $_POST['Accfrom']);
	$tempfromname = $temp[1];
	$string = htmlentities($tempfromname, null, 'utf-8');
	$tempfrom = str_replace("&nbsp;", " ", $string);
	$namefrom = html_entity_decode($tempfrom);
	$Accfrom = mysqli_real_escape_string($con, $temp[0]);
	$withTemp = mysqli_real_escape_string($con, $_POST['with']);
	$with = (int) $withTemp;
	$withNotes = $_POST['withNotes'];
	$tellerTemp=$_SESSION['username'];
	$queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
	$resultInTeller = mysqli_query($con, $queryInTeller);
	$rowTeller=mysqli_fetch_row($resultInTeller);
	$space=' ';
	$teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";
	$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
	$result = mysqli_query($con, $accountQuery);
	$row=mysqli_fetch_row($result);
	if ($with <= $row[0] && $with>0) { //basic error handling
			date_default_timezone_set('Etc/GMT+8'); //changes timezone for date to pacific time from GMT
			$timeStamp=date('m/d/Y H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
			$rema = $row[0]-$with;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$Accfrom'";
			$deduct = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account

			//This adds a new entry into the JSON file that is used to store the history of each account

			//currently it uses the account numbers for this info. I was trying to phase out account numbers and have this display the name of the account holder but this is a work in progress.
			//start audit
			$AuditHist="SELECT history FROM accounts WHERE ID = '330425394'";
			$AuditHist= mysqli_query($con, $AuditHist);		
			$AuditHist=mysqli_fetch_row($AuditHist);
			$Audit_jsonHist=json_decode($AuditHist[0],true);
			$Audittran=["Withdrew",$namefrom,'0',$teller,$with,$withNotes,'0','0'];
			$Audit_jsonHist[$timeStamp]=$Audittran;
			$Audit_jsonHist=json_encode($Audit_jsonHist);
			$Audit = mysqli_real_escape_string($con, $Audit_jsonHist);
			$AuditHist="UPDATE accounts SET history = '$Audit' WHERE accounts.ID = '330425394'";
			$AuditHistFrom=mysqli_query($con,$AuditHist);
			//end audit
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Withdrew",$namefrom,'0',$teller,$with,$withNotes,'0','0'];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$NOSPECIALCHARACERS = mysqli_real_escape_string($con, $enco_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$NOSPECIALCHARACERS' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: ../teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
		//header("Location: transfer.php");
		}
	}
?>
