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
					$rema = $row[0]-$trans;
					$updateFrom = "UPDATE accounts SET Ballance = '$rema' WHERE accounts.ID = '$Accfrom'";
					$deduct = mysqli_query($con, $updateFrom); //sets the new ballance of the transfering account
					$queryTo = "SELECT Ballance FROM accounts WHERE ID = '$Accto'";
					$resultTo = mysqli_query($con, $queryTo);
					$row3=mysqli_fetch_row($resultTo);
					$addat = $row3[0] + $trans;
					$updateto = "UPDATE accounts SET Ballance = '$addat' WHERE accounts.ID = '$Accto'";
					$deduct = mysqli_query($con, $updateto); //sets the new ballance of the account being transftered into.
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