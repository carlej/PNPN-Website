<form name="transfer"method="POST" action="Javascript/makewith_dip.php" onsubmit="return valadatewithdip();" id="addForm">
	<fieldset><legend>Deposite and Withdraw:</legend>
		<p><?php echo $usename[3]; 
		echo " ";
		echo $usename[4]; ?></p>
		<p>

			<label>Account to:</label>
			<select name="Accdeptto">
				<?php
				foreach ($parsed_json as $value) {
					if ($value) {
						echo '<option value="'.$value.'">Personal Account</option>';
					}
				}
				if($parsed_ship_json!=NULL){
					foreach ($parsed_ship_json as $value) {
						if ($value) {
							echo '<option value="'.$value.'">Ship Account</option>';
						}
					}
				}
				if($parsed_fleet_json!=NULL){
					foreach ($parsed_fleet_json as $value) {
						if ($value) {
							echo '<option value="'.$value.'">Fleet Account</option>';
						}
					}
				}
				?>
			</select>
		<p>
			<label for="trans">Ammount:</label>
			<input type="number" name="dept" id="dept" min="1">
		</p>
	</fieldset>
	<p>
		<input type="submit" name="submit" value="Withdraw" />
		<input type="submit" name="submit" value="Deposit">
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>
<script type="text/javascript">
	function Cancel(){
		$.ajax({url:'http://localhost/PNPN-Website/Javascript/cancel.php',success: function(){window.location.assign("http://localhost/PNPN-Website/bank.php")}});
	}
function valadatewithdip(){
	var acc = document.forms["transfer"]["Accto"].value;
	var tra = document.forms["transfer"]["trans"].value;
	var re=false;
	if (to==""||from=="") {
		return true;
	}
	$.ajax({
		async: false,
		type: "POST",
		url: 'http://localhost/PNPN-Website/Javascript/valwithdip.php',
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