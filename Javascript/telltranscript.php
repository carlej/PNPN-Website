<form name="transfer"method="POST" action="Javascript/tellmaketran.php" onsubmit="return valadatetran();" id="addForm">
	<fieldset>
		<legend>Transfer:</legend>
		<p>
			<label>Account from:</label>
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
			<input type="number" name="trans" id="trans" min="1">
		</p>
	</fieldset>
	<p>
		<input type="submit" name="submit" value="Transfer" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="Cancel()" />
	</p>
</form>
<script type="text/javascript">
	function Cancel(){
		$.ajax({url:'http://localhost/SDN-Website/Javascript/cancel.php',success: function(){window.location.assign("http://localhost/SDN-Website/teller.php")}});
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
		url: 'http://localhost/SDN-Website/Javascript/valTran.php',
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

