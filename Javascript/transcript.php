<form name="transfer" method="POST" id="transferForm">
	<fieldset>
		<legend>Transfer:</legend>
		<p><?php
		$split="-!split!-";
		//echo $split;
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
		<?php if($_SESSION['hold']=='hold'): ?>
		<div id="searcher">
			<select name="type" class="SearchBy" >
				<option>Search by:</option>
				<option value="Pname">Pirate Name</option>
				<option value="Fname">First Name</option>
				<option value="Lname">Last Name</option>
				<option value="Username">Email</option>
				<option value="shipID" style="display:none;">shipID</option>
				<option value="Ship">Ship/House</option>
				<option value="fleetID" style="display:none;">fleetID</option>
				<option value="Fleet">Fleet/Alliance</option>
			</select>
			<input type="text" required name="input" id="input" style="width: 38em">
			<input type="submit" name= "submit" value="Search" class="submit">
			<input type="hidden" name="new" value="new" class="submit">
		</div>
		<?php else: ?>	
		<p id= "transearched">
			<label for="Accto">Account to:</label>
			<input disabled  value=<?php echo $_SESSION['hold'] ?>>
			<input type="hidden" value= <?php echo $_SESSION['temp']; ?> name="Accto" id="Accto">
		</p>
		<?php  ?>

		<?php endif; ?>
				
		<!--<p>
			<label for="Accto">Account to:</label>
			<input type="number" name="Accto" id="Accto" min="100000000" max="999999999">
		</p>-->
		<p>
			<label for="trans">Amount to Transfer:</label>
			<input type="number" name="trans" id="trans" min="1">
		</p>
		<p>
			<label for="notes">Notes:</label>
			<input type="text" name="notes" maxlength="100" onkeyup="textCounter(this,'tranCount',100);">
			<input disabled  maxlength="3" size="3" value="100" id="tranCount">
		</p>
	</fieldset>
	<p>
		<input type="submit" name="submit" value="Transfer" />
		<input type="reset" value="Clear" onclick="Cancel(<?php echo $_SERVER['PHP_SELF']; ?>)" />
		<input type="button" name="button" value="Cancel" onclick="Cancel(<?php echo $_SERVER['PHP_SELF']; ?>)" />
	</p>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
	include "transearch.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Transfer") {
	$valid=false;
	include('valTran.php');
	if ($valid) {
		include('maketran.php');
		$madetran=true;
	}
}//$.ajax({url:'http://localhost/PNPN-Website/Javascript/cancel.php',success: function(){window.location.assign("http://localhost/PNPN-Website/bank.php")}});

?>
<script type="text/javascript">
	function Cancel(from){
		$.ajax({
		async: false,
		type: "POST",
		url: 'http://localhost/PNPN-Website/Javascript/clear.php',
		data:{from},
		dataType: 'JSON',
		success: function(output){
			if(output[1])
				alert(output[1]);
			re=output[0];
		}
});
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

<script type="text/javascript">
function textCounter(field,field2,maxlimit){
	var countfield = document.getElementById(field2);
	if ( field.value.length > maxlimit ) {
		field.value = field.value.substring( 0, maxlimit );
		return false;
	}
	else {
		countfield.value = maxlimit - field.value.length;
	}
}
</script>

