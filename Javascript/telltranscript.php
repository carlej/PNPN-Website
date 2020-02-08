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
		<p>
			<label for="notes">Notes:</label>
			<input type="text" name="tranNotes" maxlength="100" onkeyup="textCounter(this,'tranCount',100);">
			<input disabled  maxlength="3" size="3" value="100" id="tranCount">
		</p>
	</fieldset>

	<p>
		<input type="hidden" name="delim" value="tran">
		<input type="submit" name="tran" value="Transfer" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>

<div class="tellDepositFormdiv">
<form name="Deposit"method="POST" action="Javascript/tellmaketran.php" id="tellDepositForm">
	<legend>Deposit:</legend>
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
			<label for="depts">Amount to Deposit:</label>
			<input type="number" name="depts" id="depts" min="1">
		</p>
		<p>
			<label for="notes">Notes:</label>
			<input type="text" name="deptNotes" maxlength="100" onkeyup="textCounter(this,'deptCount',100);">
			<input disabled  maxlength="3" size="3" value="100" id="deptCount">
		</p>
	</fieldset>

	<p>
		<input type="hidden" name="delim" value="dept">
		<input type="submit" name="dept" value="Deposit" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>
</div>

<div class="tellWithdrawFormdiv">
<form name="Withdraw"method="POST" action="Javascript/tellmaketran.php" id="tellWithdrawForm">
	<legend>Withdraw:</legend>
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
			<label for="with">Amount to Withdraw:</label>
			<input type="number" name="with" id="with" min="1">
		</p>
		<p>
			<label for="notes">Notes:</label>
			<input type="text" name="withNotes" maxlength="100" onkeyup="textCounter(this,'withCount',100);">
			<input disabled  maxlength="3" size="3" value="100" id="withCount">
		</p>
	</fieldset>

	<p>
		<input type="hidden" name="delim" value="with">
		<input type="submit" name="dept" value="Withdraw" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>
</div>



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

<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>

