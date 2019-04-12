<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Submit"){
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$Accfrom = mysqli_real_escape_string($con, $_POST['Accfrom']);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	$goodtran = false;
	foreach ($parsed_json as $value) {
		if ($value == $Accfrom) {
			$goodtran = true;
		}
	}
	if ($goodtran) {
			$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$Accfrom'";
			$result = mysqli_query($con, $accountQuery);
			$row=mysqli_fetch_row($result);
			echo $row[0];
			if ($trans <= $row[0]) {
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
					$queryHistTo="SELECT history FROM accounts WHERE ID = '$Accto'";
					$queryHistFrom="SELECT history FROM accounts WHERE ID = '$Accfrom'";

					$resultHistTo= mysqli_query($con, $queryHistTo);
					$resultHistFrom= mysqli_query($con, $queryHistFrom);
					
					$rowHistTo=mysqli_fetch_row($resultHistTo);
					$rowHistFrom=mysqli_fetch_row($resultHistFrom);
					
					$parsed_jsonHistTo=json_decode($rowHistTo[0],true);
					$parsed_jsonHistFrom=json_decode($rowHistFrom[0],true);
					
					$dep=["deposite",$Accfrom,$Accto,$trans];
					$tran=["Transfer",$Accfrom,$Accto,$trans];

					$parsed_jsonHistTo[$timeStamp]=$dep;
					$parsed_jsonHistFrom[$timeStamp]=$tran;

					$enco_jsonHistTo=json_encode($parsed_jsonHistTo);
					$enco_jsonHistFrom=json_encode($parsed_jsonHistFrom);

					$queryHistTo="UPDATE accounts SET history = '$enco_jsonHistTo' WHERE accounts.ID = '$Accto'";
					$queryHistFrom="UPDATE accounts SET history = '$enco_jsonHistFrom' WHERE accounts.ID = '$Accfrom'";

					$resultHistTo=mysqli_query($con,$queryHistTo);
					$resultHistFrom=mysqli_query($con,$queryHistFrom);

					header("Location: /SDN-Website/transfer.php");
				}
				else
					echo "error that account doesn't exist";
			}
			else
				echo "error you don't have enough money";
		}
		else
			echo "error you don't have access to that account";
	
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Cancel"){

	header("Location: /SDN-Website/bank.php");
}
?>

<form method="post" id="addForm">
	<fieldset>
		<legend>Transfer:</legend>
		<p>
			<label for= "Accfrom">Account from:</label>
			<input type="number" name="Accfrom" id="Accfrom" min="100000000" max="999999999">
		</p>
		<p>
			<label for="Accto">Account to:</label>
			<input type="number" name="Accto" id="Accto" min="100000000" max="999999999">
		</p>
		<p>
			<label for="trans">Ammount to Transfer:</label>
			<input type="number" name="trans" id="trans">
		</p>
	</fieldset>
	<p>
		<input type="submit" name="button" value="Submit" />
		<input type="reset" value="Clear" />
		<input type="submit" name="button" value="Cancel" />
	</p>
</form>