<?php //This file is to display the accounts and the transfer window that anyone can see so that they can make account to account transfers without going to the bank?>

<form name="transfer"method="POST" action="Javascript/tellmaketran.php" id="telltransferForm">
	<fieldset>
		<legend>Transfer:</legend>
		<p><?php
		echo $name;
		$split="-!split!-";
		?></p>
		<p>

			<label>Account from:</label>
			<select name="Accfrom">
				<?php
				foreach ($parsed_json as $value) {
					if ($value) {
						echo '<option value="'."{$value}{$split}{$name}".'">'.$name.'</option>';
					}
				}
				if($parsed_ship_json!=NULL){
					foreach ($parsed_ship_json as $value) {
						if ($value) {
							echo '<option value="'."{$value}{$split}{$shipName}".'">'.$shipName.'</option>';
						}
					}
				}
				if($parsed_fleet_json!=NULL){
					foreach ($parsed_fleet_json as $value) {
						if ($value) {
							echo '<option value="'."{$value}{$split}{$fleetName}".'">'.$fleetName.'</option>';
						}
					}
				}
				?>
			</select>
			
		</p>
		<p><?php //This may end up having a search function attached to it to search for an account vs having to type in an account number?>
			<label for="Accto">Account to:</label>
			<input type="number" name="Accto" id="Accto" min="100000000" max="999999999">
		</p>
		<p>
			<label for="trans">Amount to Transfer:</label>
			<input type="number" name="trans" id="trans" min="1">
		</p>
	</fieldset>

	<p>
		<input type="hidden" name="delim" value="tran">
		<input type="submit" name="tran" value="Transfer" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>

<form name="Deposite"method="POST" action="Javascript/tellmaketran.php" id="tellDepositeForm">
	<legend>Deposite:</legend>
		<p><?php
		echo $name;
		$split="-!split!-";
		?></p>
		<p>

			<label>Account from:</label>
			<select name="Accfrom">
				<?php
				foreach ($parsed_json as $value) {
					if ($value) {
						echo '<option value="'."{$value}{$split}{$name}".'">'.$name.'</option>';
					}
				}
				if($parsed_ship_json!=NULL){
					foreach ($parsed_ship_json as $value) {
						if ($value) {
							echo '<option value="'."{$value}{$split}{$shipName}".'">'.$shipName.'</option>';
						}
					}
				}
				if($parsed_fleet_json!=NULL){
					foreach ($parsed_fleet_json as $value) {
						if ($value) {
							echo '<option value="'."{$value}{$split}{$fleetName}".'">'.$fleetName.'</option>';
						}
					}
				}
				?>
			</select>
		</p>
		<p>
			<label for="dept">Amount to Deposite:</label>
			<input type="number" name="dept" id="dept" min="1">
		</p>
	</fieldset>

	<p>
		<input type="hidden" name="delim" value="dept">
		<input type="submit" name="dept" value="Deposite" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>



<script type="text/javascript">
	function Cancel(){
		$.ajax({url:'http://localhost/PNPN-Website/Javascript/cancel.php',success: function(){window.location.assign("http://localhost/PNPN-Website/teller.php")}});
	}
function valadatetran(){
	var to = document.forms["transfer"]["Accto"].value;
	var from = document.forms["transfer"]["Accfrom"].value;
	var tra = document.forms["transfer"]["trans"].value;
	var re=false;
	if (to==""||from=="") {
		return true;
	}
	$.ajax({
		async: false,
		type: "POST",
		url: 'http://localhost/PNPN-Website/Javascript/valTran.php',
		data:{to,from,tra},
		dataType: 'JSON',
		success: function(output){
			if(output[1])
				alert(output[1]);
			re=output[0];
		}
});
	return re;

}</script>

