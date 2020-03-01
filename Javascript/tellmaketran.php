<?php //this file is so that a teller can make a transaction
//It is mostly the same as the other transaction file but changed slightly to make it function for a teller
include("Connections/req.php");
include 'Connections/convar.php';
$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
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
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	$tranNotes = mysqli_real_escape_string($con, $_POST['tranNotes']);
	$tempname = mysqli_real_escape_string($con, $_POST['name']);
	$string = htmlentities($tempname, null, 'utf-8');
	$tempname = str_replace("&nbsp;", " ", $string);
	$name = html_entity_decode($tempname);
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
			$timeStamp=date('Y/m/d H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
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
			$queryHistTo="SELECT history FROM accounts WHERE ID = '$Accto'";
			$resultHistTo= mysqli_query($con, $queryHistTo);
			$rowHistTo=mysqli_fetch_row($resultHistTo);
			$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
			$dep=["Transfered",$namefrom,$name,$trans,$teller,$tranNotes];
			$parsed_jsonHistTo[$timeStamp]=$dep;
			$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
			$queryHistTo="UPDATE accounts SET history = '$enco_jsonHistTo' WHERE accounts.ID = '$Accto'";
			$resultHistTo=mysqli_query($con,$queryHistTo);
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Transfered",$namefrom,$name,$trans,$teller,$tranNotes];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";
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
	$depts = mysqli_real_escape_string($con, $_POST['depts']);
	$deptNotes = mysqli_real_escape_string($con, $_POST['deptNotes']);
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
			$timeStamp=date('Y/m/d H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
			$rema = $row[0]+$depts;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$Accfrom'";
			$addition = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account

			//This adds a new entry into the JSON file that is used to store the history of each account

			
			//creates history in the account making the deposited
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Deposited",$namefrom,$depts,$teller,$deptNotes,'0','0'];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: ../teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
	}
	}

	if ($_POST['delim']=='with') {
	$temp=explode("-!split!-", $_POST['Accfrom']);
	$tempfromname = $temp[1];
	$string = htmlentities($tempfromname, null, 'utf-8');
	$tempfrom = str_replace("&nbsp;", " ", $string);
	$namefrom = html_entity_decode($tempfrom);
	$Accfrom = mysqli_real_escape_string($con, $temp[0]);
	$with = mysqli_real_escape_string($con, $_POST['with']);
	$withNotes = mysqli_real_escape_string($con, $_POST['withNotes']);
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
			$timeStamp=date('Y/m/d H:i:s'); //Adds a datestamp with the current date and time. Display in YYYY/MM/DD/ 12 hour AMPM format down to the second
			$rema = $row[0]-$with;
			$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$Accfrom'";
			$deduct = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account

			//This adds a new entry into the JSON file that is used to store the history of each account

			//currently it uses the account numbers for this info. I was trying to phase out account numbers and have this display the name of the account holder but this is a work in progress.
			//creates history in the account making the transfer
			$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";
			$resultHistFrom= mysqli_query($con, $queryHistFrom);		
			$rowHistFrom=mysqli_fetch_row($resultHistFrom);
			$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
			$tran=["Withdrew",$namefrom,$with,$teller,$withNotes,'0','0','0'];
			$parsed_jsonHistFrom[$timeStamp]=$tran;
			$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);
			$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";
			$resultHistFrom=mysqli_query($con,$queryHistFrom);
			header("Location: ../teller.php");//refreshes page to reflect new ballance
			//echo htmlspecialchars($_SERVER["PHP_SELF"]);
		//header("Location: transfer.php");
		}
	}
	elseif($with>0){
		//echo "error you don't have enough money";
		header("Location: ../teller.php");
	}
?>
