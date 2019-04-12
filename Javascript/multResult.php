<form method="POST" id="select">
	<fieldset>
		<label>Results:</label>
		<p>
			<select name="result">
				<?php
				foreach ($array as $key => $value) {
					echo '<option value=' . $value[0] . '>' . $value[0] . '</option>';
				} 
				?>
			</select>
		</p>
	</fieldset>
</form>
