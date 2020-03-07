<!doctype html>
<html>
    <head>
        <?php 
        if ($_SESSION['perm']!="b" || $_SESSION['perm']!="z") {
            ?><script type="text/javascript">window.location.href="bank.php"</script><?php
        }
        include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Grant Access</title>

    </head>
    <body class="GrantAccessPage">
    	<?php $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
			die('Could not connect: ' . mysql_error());
		} 
        $ID = $_SESSION['hold'];
        $type = $_SESSION['stype'];

        $queryIn = "SELECT * FROM users WHERE `$type` LIKE '%$ID%'";
        $resultIn = mysqli_query($con, $queryIn);
        $row = mysqli_fetch_row($resultIn);
        $shipName='&nbsp';
        $fleetName='&nbsp';
        if ($row[7]) {//ship
        	$queryShip = "SELECT * FROM ship WHERE ID = '$row[7]'";
			$resultShip= mysqli_query($con,$queryShip);
			$rowShip=mysqli_fetch_row($resultShip);
			$shipName=$rowShip[1];
        }
        if ($row[6]) {//fleet
        	$queryFleet = "SELECT * FROM fleet WHERE ID = '$row[6]'";
			$resultFleet= mysqli_query($con,$queryFleet);
			$rowFleet=mysqli_fetch_row($resultFleet);
			$fleetName=$rowFleet[1];
        }
        //echo $_POST['submit'];
        //echo $_POST['Edit'];
        ?>
    	<div class = "container" >
            <div class = "d-flex justify-content-center" id = "GrantAccess">
                <div class = "row">
                    <div class = "col-xl">
                    	<legend id="AcctInfoDisp">Grant Account Access:</legend>
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Edit"): 
                        ?>
                        <?php
                            if ($_POST["Edit"] == "Ship"):
                        ?>    
							<form method="POST">
                                <fieldset>
                                    <div class = "row">
                                        <p>
                                        	<label style="padding-right: 6.0em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Ship or Household: </label>
                                            <div class = "col-sm" style="margin-bottom: 1.5em">
                                            	<?php if($shipName=='&nbsp'):?>
                                            		<input type="text" name="name" required>
                                            	<?php else: ?>
                                                	<input type="text" name="name" value=<?php echo $shipName;?> required>
                                                <?php endif; ?>
                                                <input type="submit" name="submit" value="Confirm">
                                                <input type="hidden" name="delim" value="Ship">
                                                <input type="submit" name="submit" value="Cancel" onclick="location.href='GrantAccess.php';">
                                            </div>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
	                        <form method="POST">
	                            <fieldset>
                                    <div class = "row">
    	                            	<p>
    	                            		<label style="padding-right: 6.3em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Fleet or Alliance: </label>
                                            <div class = "col-sm" style="margin-bottom: 1.5em">
        	                                    <label><?php echo $fleetName; ?></label>
        	                                    <input type="submit" name="submit" value="Edit">
        	                                    <input type="hidden" name="Edit" value="Fleet">
                                            </div>
    	                            	</p>
                                    </div>
	                            </fieldset>
	                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Fleet"):
                        ?>
	                        <form method="POST">
	                            <fieldset>
                                    <div class = "row">
    	                            	<p>
    	                            		<label style="padding-right: 6.0em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Ship or Household: </label>
                                            <div class = "col-sm" style="margin-bottom: 1.5em">
        	                                    <label><?php echo $shipName; ?></label>
        	                                    <input type="submit" name="submit" value="Edit">
        	                                    <input type="hidden" name="Edit" value="Ship">
                                            </div>
    	                            	</p>
                                    </div>
	                            </fieldset>
	                        </form>
                            <form method="POST">
                                <fieldset>
                                    <div class="row">
                                        <p>
                                        	<label style="padding-right: 6.3em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Fleet or Alliance: </label>
                                            <div class="col-sm" style="margin-bottom: 1.5em">
                                                <?php if($fleetName=='&nbsp'):?>
                                            		<input type="text" name="name" required>
                                            	<?php else: ?>
                                                	<input type="text" name="name" value=<?php echo $fleetName;?> required>
                                                <?php endif; ?>
                                                <input type="submit" name="submit" value="Confirm">
                                                <input type="hidden" name="delim" value="Fleet">
                                                <input type="submit" name="submit" value="Cancel" onclick="location.href='GrantAccess.php';">
                                            </div>
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        <?php
                            endif;
                        ?>
                        <?php 
                            elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Confirm"):
                                if ($_POST['delim']=='Ship') {
                            		//echo $_POST['name'];
                            		$input=mysqli_real_escape_string($con,$_POST['name']);
                            		$queryShipNest = "SELECT * FROM ship WHERE Name LIKE '%$input%'";
                            		$resultShipNest = mysqli_query($con, $queryShipNest);
                            		if (mysqli_num_rows($resultShipNest)>1) {
                            			$array=NULL;
										$array = $resultShipNest->fetch_all(MYSQLI_NUM);
										$_SESSION['multsearch']=$array;?>
                            			<form method="POST" id="SearchBy2">
											<fieldset>
												<label>Select: </label><select name="name">
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
													echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
													} ?>
												</select>
												<label for="name">   </label>
												<input type="submit" name="submit" value="Confirm">
                                    			<input type="hidden" name="delim" value="Ship">
												<input type="submit" name="submit" value="Clear" />
											</fieldset>
										</form><?php
                            		}
                            		else if(mysqli_num_rows($resultShipNest)==1){
                            			$IDnum=mysqli_fetch_row($resultShipNest);
                            			$update = "UPDATE users SET Ship = '$IDnum[0]' WHERE `$type` LIKE '%$ID%'";
                                    	$temp=mysqli_query($con, $update);
                                    	$_SESSION['multsearch']=array('1');
                                    	header("Location: GrantAccess.php");
                            		}
                            		else {
                            			?>
                                        <form method="POST">
                                            <fieldset>
                                                <div class="row">
                                                    <p>
                                                        <label style="padding-right: 6.0em; padding-left: 1em; padding-bottom: -2em; margin-bottom: -2em">Ship or Household: </label>
                                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                                            <label><?php echo $shipName; ?></label>
                                                            <div class="container" id = "NoneFound" style="margin-top: 0em">There are no ships that match that search!</div>
                                                            <input type="submit" name="submit" value="Edit">
                                                            <input type="hidden" name="Edit" value="Ship">
                                                        </div>
                                                    </p>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <form method="POST">
                                            <fieldset>
                                                <div class="row">
                                                    <p>
                                                        <label style="padding-right: 6.3em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Fleet or Alliance: </label>
                                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                                            <label><?php echo $fleetName; ?></label>
                                                            <input type="submit" name="submit" value="Edit">
                                                            <input type="hidden" name="Edit" value="Fleet">
                                                        </div>
                                                    </p>
                                                </div>
                                            </fieldset>
                                        </form><?php
                            		}
                                	
							}
                                else if ($_POST['delim']=='Fleet') {
                                	//echo $_POST['name'];
                            		$input=mysqli_real_escape_string($con,$_POST['name']);
                            		$queryFleetNest = "SELECT * FROM fleet WHERE Name LIKE '%$input%'";
                            		$resultFleetNest = mysqli_query($con, $queryFleetNest);
                            		if (mysqli_num_rows($resultFleetNest)>1) {
                            			$array=NULL;
										$array = $resultFleetNest->fetch_all(MYSQLI_NUM);
										$_SESSION['multsearch']=$array;?>
                            			<form method="POST" id="SearchBy2">
											<fieldset>
												<label>Select: </label><select name="name">
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
													echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
													} ?>
												</select>
												<label for="name">   </label>
												<input type="submit" name="submit" value="Confirm">
                                    			<input type="hidden" name="delim" value="Fleet">
												<input type="submit" name="submit" value="Clear" />
											</fieldset>
										</form><?php
                            		}
                            		else if(mysqli_num_rows($resultFleetNest)==1){
                            			$IDnum=mysqli_fetch_row($resultFleetNest);
                            			$update = "UPDATE users SET Fleet = '$IDnum[0]' WHERE `$type` LIKE '%$ID%'";
                                    	$temp=mysqli_query($con, $update);
                                    	$_SESSION['multsearch']=array('1');
                                    	header("Location: GrantAccess.php");
                            		}
                            		else {
                                        ?>
                                        <form method="POST">
                                            <fieldset>
                                                <div class="row">
                                                    <p>
                                                        <label style="padding-right: 6.0em; padding-left: 1em; padding-bottom: -2em; margin-bottom: -2em">Ship or Household: </label>
                                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                                            <label><?php echo $shipName; ?></label>
                                                            <input type="submit" name="submit" value="Edit">
                                                            <input type="hidden" name="Edit" value="Ship">
                                                        </div>
                                                    </p>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <form method="POST">
                                            <fieldset>
                                                <div class="row">
                                                    <p>
                                                        <label style="padding-right: 6.3em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Fleet or Alliance: </label>
                                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                                            <label><?php echo $fleetName; ?></label>
                                                            <div class="container" id = "NoneFound" style="margin-top: 0em">There are no fleets that match that search!</div>
                                                            <input type="submit" name="submit" value="Edit">
                                                            <input type="hidden" name="Edit" value="Fleet">
                                                        </div>
                                                    </p>
                                                </div>
                                            </fieldset>
                                        </form><?php
                            		}
                                	
							}

                        ?>
                        <?php 
                            else: 
                        ?>
                        <form method="POST">
                            <fieldset>
                                <div class="row">
                                	<p>
                                		<label style="padding-right: 6.0em; padding-left: 1em; padding-bottom: -2em; margin-bottom: -2em">Ship or Household: </label>
                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                            <label><?php echo $shipName; ?></label>
                                            <input type="submit" name="submit" value="Edit">
                                            <input type="hidden" name="Edit" value="Ship">
                                        </div>
                                	</p>
                                </div>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <div class="row">
                                	<p>
                                		<label style="padding-right: 6.3em; padding-left: 1em; padding-bottom: -1.5em; margin-bottom: -2em">Fleet or Alliance: </label>
                                        <div class="col-sm" style="margin-bottom: 1.5em">
                                            <label><?php echo $fleetName; ?></label>
                                            <input type="submit" name="submit" value="Edit">
                                            <input type="hidden" name="Edit" value="Fleet">
                                        </div>
                                	</p>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                            endif;
                        ?>

                        <input type="submit" name="submit" value="Back to Teller" onclick="location.href='teller.php';" style="margin-top: 1em">
                                   
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

