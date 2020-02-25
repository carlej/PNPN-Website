<div class = "container" id = "UserTransfer">
	<div class = "d-flex justify-content-left"> 
<form name="transfer" method="POST" id="transferForm">
	<fieldset>
		<div class = "col-sm">
		<legend style="border-bottom: solid 0.05em;">Transfer:</legend>
		<p>
			<?php
			$split="-!split!-";
			//echo $split;
			//echo $_SESSION['stype'];
			//echo $_SESSION['multsearch'][0][0];
			//echo $_SESSION['temp'];
			//echo $_SESSION['nest'];
			/*foreach ($_SESSION['multsearch'] as $key => $value){
				echo "\n";
				echo $value[0];
			}*/
			?>
		</p>
		<p>
		<?php if($_SESSION['nest']=='hold' && $_SESSION['multsearch'][0][0]!='1'): ?>
			<?php if($_SESSION['stype']=="shipID"): ?>
				<form method="POST" id="SearchBy2">
					<fieldset>
						<label>Select: </label>
						<select name="input">
							<?php foreach ($_SESSION['multsearch'] as $key => $value) {//this will desplay the name of each captain as each should be different
							//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
								$queryIn = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
								$resultIn = mysqli_query($con, $queryIn);
								$row = mysqli_fetch_row($resultIn);
								if ($row[5]!=NULL) {
									$nameUnedit=$row[5];
								}
								else{
									$nameUnedit=$row[3].' '.$row[4];
								}
								$capname=str_replace(' ', '&nbsp;', $nameUnedit);
								echo '<option value="'.$value[0].'">"Captain: " '.$capname.'</option>';
								} ?>
						</select>
						<label for="input">   </label>
						<input type="submit" name= "submit" value="Search" >
						<input type="hidden" name="type" value="shipID">
						<input type="hidden" name="new" value="new">
						<input type="submit" name="submit" value="Clear" />
					</fieldset>
				</form>
			<?php elseif($_SESSION['stype']=="fleetID"): ?>
				<form method="POST" id="SearchBy2"><fieldset><label>Select: </label><select name="input">';
					<?php foreach ($_SESSION['multsearch'] as $key => $value) {//this will desplay the name of each captain as each should be different
					 	$queryIn = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
						$resultIn = mysqli_query($con, $queryIn);
						$row = mysqli_fetch_row($resultIn);
						if ($row[5]!=NULL) {
							$nameUnedit=$row[5];
						}
						else{
							$nameUnedit=$row[3].' '.$row[4];
						}
						$capname=str_replace(' ', '&nbsp;', $nameUnedit);
						echo '<option value="'.$value[0].'">"Captain: " '.$capname.'</option>';
					}
					$input2 = mysqli_real_escape_string($con, $_POST['input']);
				
				echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search" ><input type="hidden" name="type" value="fleetID"><input type="hidden" name="new" value="new"><input type="submit" name="submit" value="Clear" /></fieldset></form>'; ?>
				</div>
				<?php else: ?>
					<form method="POST" id="SearchBy2">
						<fieldset>
							<label>Select: </label>
								<select name="input">';
									<?php
									foreach ($_SESSION['multsearch'] as $key => $value) {
										//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
										echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
									}
									//echo '</form>';
									$input2 = mysqli_real_escape_string($con, $_POST['input']);
									echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="new"><input type="submit" name="submit" value="Clear" /></fieldset></form>'; ?>
									<?php endif; ?>
									<?php elseif($_SESSION['nest']=='hold' && $_SESSION['multsearch'][0][0]=='1'): ?>	
									<p id="searcher">
										<p style="margin-bottom: 0em; margin-top: -0.4em;">Account to:</p>
										<select name="type" class="SearchBy3" style="margin-bottom: 0em">
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
										<input type="text" required name="input" id="input" style="width: 95%; font-family: arial; margin-bottom: 0.3em">
										<input type="submit" name= "submit" value="Search" class="submit">
										<input type="hidden" name="new" value="new" class="submit">
										</p>
									</p>
									<?php else: ?>
										<p id= "transearched" style="margin-top: -0.5em">
											<label for="Accto">Account to:</label>
											<input disabled  value=<?php echo $_SESSION['nest'] ?>>
											<input type="hidden" value= <?php echo $_SESSION['temp'];?> name= "Accto" id="Accto">
										</p>
										<p style="margin-bottom: 0.5em; margin-top: -0.5em">
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
											<p style="margin-top: -0.7em">
												<label for="trans" style="margin-bottom: -1em;">Amount to Transfer:</label>
												<input type="number" name="trans" id="trans" min="1" style="width: 85%" />
											</p>
											<p style="margin-top: 0em">
												<label for="notes">Notes:</label>
												<input type="text" name="notes" maxlength="50" style="width: 68%" />
											</p>
											<p style="margin-top: -0.5em">
												<input type="submit" name="submit" value="Transfer" />
												<input type="submit" name="submit" value="Clear" />
												<input type="submit" name="submit" value="Cancel" />
												<input type="hidden" name="name" value=<?php echo $_SESSION['nest'] ?>>
											</p>
											
										<?php endif; ?>
						</fieldset>
					</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
	include "transearch.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Transfer") {
	$valid=0;
	include('valTran.php');
	if ($valid==1) {
		include('maketran.php');
	}
	elseif ($valid==2) {
		echo '<script type="text/javascript">alert("That account does not exist");</script>';
	}
	else{
		echo '<script type="text/javascript">alert("You do not have anough money");</script>';
	}
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['submit'] == "Cancel" || $_POST['submit'] == "Clear")){
	include('clear.php');
	?><script type="text/javascript">window.location.href='/PNPN-Website/bank.php'</script><?php
	//$_SESSION['nest']="nest";
	//$_SESSION['temp']="temp";
	//echo '<script type="text/javascript">window.location.href="/PNPN-Website/bank.php"</script>';
}

?>
<script type="text/javascript">
	function Cancel(){
		window.location.href='/PNPN-Website/Javascript/clear.php';
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

