<?php //This file is to display the accounts and the transfer window that anyone can see so that they can make account to account transfers without going to the bank?>
<div class = "container" id = "TellerFunction">
	<div class = "TellerActions">Teller Actions</div>
	<div class = "row">
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
		<p>
		<?php if($_SESSION['nest']=='hold' && $_SESSION['nstype']): ?>
			<form name="transferSearch" method="POST" id="transferSearchForm">
	<fieldset>
		<div class = "col-sm">
		<legend style="border-bottom: solid 0.05em;">Transfer:</legend>
			<?php if($_SESSION['nstype']=="shipID"): ?>
				<form method="POST" id="SearchBy2">
					<fieldset>
						<label>Select: </label><select name="ninput">
						<?php foreach ($_SESSION['multsearch'] as $key => $value) {//this will desplay the name of each captain as each should be different
						//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
							echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
							} ?>
						</select>
						<label for="ninput">   </label>
						<input type="submit" name= "submit" value="Search" >
						<input type="hidden" name="ntype" value="shipID">
						<input type="hidden" name="new2" value="new2">
						<input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>>
						<input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?>>
						<input type="submit" name="submit" value="Clear" />
					</fieldset>
				</form>
			<?php elseif($_SESSION['nstype']=="fleetID"): ?>
				<form method="POST" id="SearchBy2"><fieldset><label>Select: </label><select name="ninput">';
				 <?php foreach ($_SESSION['multsearch'] as $key => $value) {//this will desplay the name of each captain as each should be different
				 	echo $value[0];
					echo '<option value="'.$value[0].'">"Captain: " '.$value[2].'</option>';
				}
				$input2 = mysqli_real_escape_string($con, $_POST['ninput']);
				
				echo '</select><label for="ninput">   </label><input type="submit" name= "submit" value="Search" ><input type="hidden" name="ntype" value="shipID"><input type="hidden" name="new2" value="new2"><input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>><input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?>><input type="submit" name="submit" value="Clear" /></fieldset></form>'; ?>
				</div>
				<?php else: ?>
					<form method="POST" id="SearchBy2">
						<fieldset>
							<label>Select: </label>
							<select name="ninput">';
								<?php
								foreach ($_SESSION['multsearch'] as $key => $value) {
									//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
									echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
								}
								//echo '</form>';
								$input2 = mysqli_real_escape_string($con, $_POST['ninput']);
								echo '</select><label for="ninput">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="ntype" value="Username"><input type="hidden" name="new2" value="new2"><input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>><input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?>><input type="submit" name="submit" value="Clear" /></fieldset></form>'; ?>
					</div>
				<?php endif; ?>
		<?php elseif($_SESSION['nest']=='hold' && $_SESSION['multsearch'][0][0]=='1'): ?>
		<form name="transferSearch" method="POST" id="transferSearchForm">
	<fieldset>
		<div class = "col-sm">
		<legend style="border-bottom: solid 0.05em;">Transfer:</legend>	
			<p>
			<p id="searcher">
				<p style="margin-bottom: 0em; margin-top: -0.7em;">Account to:</p>
				<select name="ntype" class="SearchBy3" style="margin-bottom: 0.3em">
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
				<input type="text" required name="ninput" id="ninput" style="width: 95%; font-family: arial; margin-bottom: 0.3em">
				<input type="submit" name= "submit" value="Search" class="submit">
				<input type="hidden" name="new2" value="new2" class="submit">
				<input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>>
				<input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?>>
			</p>
			</p>
			</fieldset>
		</form>
		
		<?php else: ?>
			<form name="transfer" method="POST" action="Javascript/tellmaketran.php" id="transferForm">
				<fieldset>
					<p style="margin-bottom: -0.3em">
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
					<p id= "transearched" style="margin-top: -0.5em">
						<label for="Accto">Account to:</label>
						<input disabled  value=<?php echo $_SESSION['nest'] ?>>
						<input type="hidden" value= <?php echo $_SESSION['temp'];?> name= "Accto" id="Accto">
					</p>
		
				
		<!--<p>
			<label for="Accto">Account to:</label>
			<input type="number" name="Accto" id="Accto" min="100000000" max="999999999">
		</p>-->
		
		<p style="margin-top: -0.7em">
			<label for="trans" style="margin-bottom: -1em;">Amount to Transfer:</label>
			<input type="number" name="trans" id="trans" min="1" style="width: 85%" />
		</p>
		<p style="margin-top: -0.5em">
			<label for="notes">Notes:</label>
			<input type="text" name="tranNotes" maxlength="50" style="width: 68%" />
		</p>
	
	<p style="margin-top: -0.5em">
		<input type="submit" name="submit" value="Transfer" />
		<input type="hidden" name="delim" value="tran">
		<input type="submit" name="submit" value="Clear" />
		<input type="button" name="button" value="Cancel" onclick="location.href='/PNPN-Website/Javascript/clearall.php';"/>
		<input type="hidden" name="name" value=<?php echo $_SESSION['nest'] ?>>
	</p>
	<?php endif; ?>
	</div>
	</fieldset>
</form>
</div>
</div>

<div class="tellDepositFormdiv">
<form name="Deposit"method="POST" action="Javascript/tellmaketran.php" id="tellDepositForm">
	<fieldset>
	<div class = "col-sm">
	<legend>Deposit:</legend>
		<p><?php
		//echo $name;
		$split="-!split!-";
		?></p>
		<p>

			<label>Account to:</label>
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
			<input type="text" name="deptNotes" maxlength="50" onkeyup="textCounter(this,'deptCount',50);">
			<input disabled  maxlength="3" size="3" value="50" id="deptCount">
		</p>
	

	<p>
		<input type="hidden" name="delim" value="dept">
		<input type="submit" name="dept" value="Deposit" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" value="Cancel" onclick="location.href='/PNPN-Website/Javascript/clearall.php';"/>
	</p>
	</div>
	</fieldset>
</form>
</div>

<div class="tellWithdrawFormdiv">
<form name="Withdraw"method="POST" action="Javascript/tellmaketran.php" id="tellWithdrawForm">
	<fieldset>
	<div class = "col-sm">	
	<legend>Withdraw:</legend>
		<p><?php
		//echo $name;
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
			<input type="text" name="withNotes" maxlength="50" onkeyup="textCounter(this,'withCount',50);">
			<input disabled  maxlength="3" size="3" value="50" id="withCount">
		</p>
	

	<p>
		<input type="hidden" name="delim" value="with">
		<input type="submit" name="dept" value="Withdraw" />
		<input type="reset" value="Clear" />
		<input type="button" name="button" value="Cancel" value="Cancel" onclick="location.href='/PNPN-Website/Javascript/clearall.php';"/>
	</p>
	</div>
	</fieldset>
</form>

</div>
</div>
</div>	

<div class = "container" id = "SFEdits">
	<div class = "row">
		<div class = "col-lg-2">
			<p>
				<input type = "submit" name= "submit" value = "Add Ship/Household"?>
			</p>
		</div>
		<div class = "col-lg-2">
			<p>
				<input type = "submit" name= "submit" value = "Add Fleet/Alliance"?>
			</p>
		</div>
		<div class = "col-lg-2">
			<p>
				<input type = "submit" name= "submit" value = "Edit User"?>
			</p>
		</div>
	</div>
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

