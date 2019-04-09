<?php include("/SDN-Website/bank.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Submit") {
	$accs="{\"id\": [1,2]}";
	$update = "UPDATE users SET Accounts = '$accs' WHERE users.Username = '$username'";
	$inup= mysqli_query($con, $update);
}
?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Transfer"): ?>
	<form>
		<fieldset>
			<legend>Transfer:</legend>
			<p>
				<label for= "Accfrom">Account from:</label>
				<input type="number" name="Accfrom" id="Accfrom" min="100000000" max="999999999">
			</p>
			<p>
				<label for="Accto">Account to:</label>
				<input type="number" name="Accto" in="Accto" min="100000000" max="999999999">
			</p>
		</fieldset>
		<p>
			<input type="submit" name= "button" value="Submit" />
			<input type="reset" value="Clear" />
		</p>
	</form>
<?php endif; ?>

