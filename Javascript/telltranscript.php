<?php //This file is to display the accounts and the transfer window that anyone can see so that they can make account to account transfers without going to the bank?>
<div class = "container" id = "TellerFunction">
	<?php if($_SESSION['stype']!='shipID' && $_SESSION['stype']!='fleetID'): ?>
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
		//$test = 'volunteers';
		?>
		<p>		
			<div class = "col-md">
				<?php if($_SESSION['nest']=='hold' && $_SESSION['nstype']): ?>
				<form name="transferSearch" method="POST" id="transferSearchForm">
					<fieldset>
						<legend>Transfer:</legend>
						<?php if($_SESSION['nstype']=="shipID"): ?>
						<form method="POST" id="SearchBy2">
							<fieldset>
								<label style="margin-bottom: 0em;">Select: </label>
								<select name="ninput" style="width: 80%; margin-bottom: 0.5em; font-size: 1.1em">
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
									<label for="ninput">   </label>
									<input type="submit" name= "submit" value="Search" >
									<input type="hidden" name="ntype" value="shipID">
									<input type="hidden" name="new2" value="new2">
									<input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>>
									<input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?>>
									
							</fieldset>
						</form>
						<?php elseif($_SESSION['nstype']=="fleetID"): ?>
						<form method="POST" id="SearchBy2">
							<fieldset>
								<label style="margin-bottom: 0em;">Select: </label>
								<select name="ninput" style="width: 80%; margin-bottom: 0.5em; font-size: 1.1em">;
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
									$input2 = mysqli_real_escape_string($con, $_POST['ninput']);
									echo '</select><label for="ninput">   </label><input type="submit" name= "submit" value="Search" ><input type="hidden" name="ntype" value="fleetID"><input type="hidden" name="new2" value="new2"><input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?><input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?></fieldset></form>'; ?>
								</select>
							</fieldset>
						</form>
						<?php else: ?>
						<form method="POST" id="SearchBy2">
							<fieldset>
								<label style="margin-bottom: 0em;">Select: </label>
								<select name="ninput" style="width: 80%; margin-bottom: 0.5em; font-size: 1.1em">;
									<?php 
									if ($_SESSION['nstype']!="Pname") {
										foreach ($_SESSION['multsearch'] as $key => $value) {
										//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
										echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
										}
									}
									else{
										foreach ($_SESSION['multsearch'] as $key => $value) {
										//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
										echo '<option value="'.$value[0].'">'.$value[5].'</option>';
										}
									}
									//echo '</form>';
									$input2 = mysqli_real_escape_string($con, $_POST['ninput']);
									echo '</select><label for="ninput"></label><input type="submit" name= "submit" value="Search"><input type="hidden" name="ntype" value="Username"><input type="hidden" name="new2" value="new2"><input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?><input type="hidden" name="input" value=<?php echo $_SESSION["hold"]; ?></fieldset></form>'; ?>
								</select>
							</fieldset>
						</form>
						<?php endif; ?>
						<?php elseif($_SESSION['nest']=='hold' && $_SESSION['multsearch'][0][0]=='1'): ?>
						<form name="transferSearch" method="POST" id="transferSearchForm">
							<fieldset>
								<legend>Transfer:</legend>	
								<p>
									<p id="searcher">
										<div class="col-sm">
										<p style="margin-bottom: 0em; margin-top: -0.7em;">Account to:</p>
										</div>
										<div class="col-sm">
										<select name="ntype" class="SearchBy3" style=" margin-bottom: 0.3em;">
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
										</div>
										<div class = "col-sm">
										<input type="search" required name="ninput" id="ninput" style=" margin-bottom: 0.3em" minlength="3">
										<input type="submit" name= "submit" value="Search" class="submit">
										</div>
										<input type="hidden" name="new2" value="new2" class="submit">
										<input type="hidden" name="type" value=<?php echo $_SESSION["stype"]; ?>>
										<input type="hidden" name="input" value=<?php echo $_SESSION["hold"];?>>
									</p>
								</p>
							</fieldset>
						</form>
						<?php else: ?>
						<form name="transfer" method="POST" action="Javascript/tellmaketran.php" id="transferForm">
							<fieldset>
								<legend>Transfer:</legend>
								<p style="margin-bottom: 0.5em">
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
								<p style="margin-top: -1em">
									<label for="trans" style="margin-bottom: -1em;">Amount to Transfer:</label>
									<input type="number" name="trans" id="trans" min="1" >
								</p>
								<p style="margin-top: -0.5em">
									<label for="notes">Notes:</label>
									<input type="text" name="tranNotes" maxlength="50" >
								</p>
								<p style="margin-top: -0.5em">
									<input type="submit" name="submit" value="Transfer" >
									<input type="hidden" name="delim" value="tran">
									<input type="submit" name="submit" value="Clear" onclick="location.href='Javascript/clearsome.php';">
									<input type="hidden" name="name" value=<?php echo $_SESSION['nest'] ?>>
								</p>
							</fieldset>
						<?php endif; ?>
					</fieldset>
				</form>
			</div>
		</p>

		<div class="tellDepositFormdiv">
			<form name="Deposit"method="POST" action="Javascript/tellmaketran.php" id="tellDepositForm">
				<fieldset>
					<div class = "col-md">
						<legend>Deposit:</legend>
						<p><?php
						//echo $name;
						$split="-!split!-";
						?></p>
						<p style="margin-bottom: 0em">
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
						<p style="margin-bottom: 0em">
							<label for="depts">Amount to Deposit:</label>
							<input type="number" name="depts" id="depts" min="1">
						</p>
						<p style="margin-bottom: 0em">
							<label for="notes">Notes:</label>
							<input type="text" name="deptNotes" maxlength="50" onkeyup="textCounter(this,'deptCount',50);">
							<input disabled  maxlength="3" size="3" value="50" id="deptCount">
						</p>
						<p>
							<input type="hidden" name="delim" value="dept">
							<input type="submit" name="dept" value="Deposit" >
							<input type="reset" value="Clear" onclick="location.href='Javascript/clearsome.php';">
						</p>
					</div>
				</fieldset>
			</form>
		</div>

		<div class="tellWithdrawFormdiv">
			<form name="Withdraw"method="POST" action="Javascript/tellmaketran.php" id="tellWithdrawForm">
				<fieldset>
					<div class = "col-md">	
						<legend>Withdraw:</legend>
						<p><?php
						//echo $name;
						$split="-!split!-";
						?></p>
						<p style="margin-bottom: 0em">
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
						<p style="margin-bottom: 0em">
							<label for="with">Amount to Withdraw:</label>
							<input type="number" name="with" id="with" min="1">
						</p>
						<p style="margin-bottom: 0em">
							<label for="notes">Notes:</label>
							<input type="text" name="withNotes" maxlength="50" onkeyup="textCounter(this,'withCount',50);">
							<input disabled  maxlength="3" size="3" value="50" id="withCount">
						</p>
						<p>
							<input type="hidden" name="delim" value="with">
							<input type="submit" name="dept" value="Withdraw" >
							<input type="reset" value="Clear" onclick="location.href='Javascript/clearsome.php';">
						</p>
					</div>
				</fieldset>
			</form>
		</div>
		<?php endif; ?>
		<?php if($_SESSION['stype']!='shipID' && $_SESSION['stype']!='fleetID'): ?>
			<div class = "col-md" id = "InfoColumn">
				<legend>Info:</legend>
				<p>
					<input type = "submit" name= "submit" value = "Add Ship/Household" onclick="location.href='addShip.php';"?>
				</p>
				<p>
					<input type = "submit" name= "submit" value = "Add Fleet/Alliance" onclick="location.href='addFleet.php';"?>
				</p>
				<p>
					<input type="submit" name="submit" value="Grant Access" onclick="location.href='grantaccess.php';">
				</p>
				<p>
					<input type = "submit" name= "submit" value = "Edit User" onclick="location.href='editUser.php';">
				</p>
			</div>
		<?php elseif($_SESSION['stype']=='shipID'):
			$input = $_SESSION['hold'];
			$queryIn = "SELECT * FROM ship WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            ?>
            <div class = "col-md">
			<p>
				<input type = "submit" name= "submit" id="TranOwnership" value = "Transfer Ownership of Ship/Household" onclick="location.href='editShipFleet.php';"?>
			</p>
			<form method="POST">
				<fieldset>
					<input type="submit" name="submit" value="Show Crew" id="ShowCrew">
					<input type="hidden" name="test" value="crew">
				</fieldset>
			</form>
			<?php 
			$user = $row[2];
			$queryUser = "SELECT * FROM users WHERE Username LIKE '%$user%'";
            $resultUser = mysqli_query($con, $queryUser);
            $rowUser = mysqli_fetch_row($resultUser);
            if ($rowUser[5]==NULL) {
            	$nameUser = $rowUser[3].' '.$rowUser[4];
            }
            else
            	$nameUser = $rowUser[5];
			echo '<li class="DispLeader">Leader: '.$nameUser.'</li>';
			if ($_POST['test']=="crew") {
				$queryInUser = "SELECT * FROM users WHERE shipC = '$input'";
	            $resultInUser = mysqli_query($con, $queryInUser);
	            $array = $resultInUser->fetch_all(MYSQLI_NUM);
	            ?><div class="container" id="HistBox"><?php
		            foreach ($array as $key => $value) {
		            	if ($value[5]==NULL) {
		            		$name = $value[3].' '.$value[4];
		            	}
		            	else
		            		$name = $value[5];
		            	echo '<li>'.$name.'</li>';
		            }
		            ?></div><?php
			}
			?></div>
		<?php elseif($_SESSION['stype']=='fleetID'):
			$input = $_SESSION['hold'];
			$queryIn = "SELECT * FROM fleet WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            ?>
            <div class = "col-md">
			<p>
				<input type = "submit" name= "submit" id="TranOwnership" value = "Transfer Ownership of Fleet/Aliance" onclick="location.href='editShipFleet.php';"?>
			</p>
			<form method="POST">
				<fieldset>
					<input type="submit" name="submit" value="Show Crew" id="ShowCrew">
					<input type="hidden" name="test" value="crew">
				</fieldset>
			</form>
			<?php 
			$user = $row[2];
			$queryUser = "SELECT * FROM users WHERE Username LIKE '%$user%'";
            $resultUser = mysqli_query($con, $queryUser);
            $rowUser = mysqli_fetch_row($resultUser);
            if ($rowUser[5]==NULL) {
            	$nameUser = $rowUser[3].' '.$rowUser[4];
            }
            else
            	$nameUser = $rowUser[5];
			echo '<li class="DispLeader">Leader: '.$nameUser.'</li>';
			if ($_POST['test']=="crew") {
				$queryInUser = "SELECT * FROM users WHERE fleetC = '$input'";
	            $resultInUser = mysqli_query($con, $queryInUser);
	            $array = $resultInUser->fetch_all(MYSQLI_NUM);
	            ?><div class="container" id="HistBox"><?php
		            foreach ($array as $key => $value) {
		            	if ($value[5]==NULL) {
		            		$name = $value[3].' '.$value[4];
		            	}
		            	else
		            		$name = $value[5];
		            	echo '<li>'.$name.'</li>';
		            }
		            ?></div><?php
			}
			?></div>
		<?php endif; ?>



<script type="text/javascript">
	function Cancel(){
		$.ajax({url:'http://Javascript/cancel.php',success: function(){window.location.assign("http://teller.php")}});
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
		url: 'http://Javascript/valTran.php',
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

