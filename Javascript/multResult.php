<form method="POST" id="select">
	<fieldset>
		<label>Results:</label>
		<p>
			<select name="result">
				<?php foreach ($array as $value): ?>
					<p>
						<option value=<?php $value ?>><<?php $value ?></option>
					</p>
				<?php endforeach; ?>
			</select>
		</p>
	</fieldset>
</form>