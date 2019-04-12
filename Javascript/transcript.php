<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Submit"){
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	$Accfrom = mysqli_real_escape_string($con, $_POST['Accfrom']);
	$Accto = mysqli_real_escape_string($con, $_POST['Accto']);
	$trans = mysqli_real_escape_string($con, $_POST['trans']);
	include "Javascript/maketran.php";
	mysqli_close($con);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['button'] == "Cancel")
	header("Location: /SDN-Website/bank.php");
?>

<form method="post" id="addForm">
	<fieldset>
		<legend>Transfer:</legend>
		<p>
			<select name="Accfrom">
				<?php
				foreach ($parsed_json as $value) {
					if ($value) {
						echo '<option value="'.$value.'">'.$value.'</option>';
					}
				}
				?>
			</select>
			
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