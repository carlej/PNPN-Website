<form name="transfer"method="POST" action="Javascript/maketran.php" id="addForm">
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
		<input type="submit" name="submit" value="Cancel"/>
	</p>
</form>

