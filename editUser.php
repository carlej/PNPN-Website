<!--This will allow Tellers to edit user information-->

<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Edit User</title>

    </head>
    <body class="EditUserPage">

    	<?php $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
			die('Could not connect: ' . mysql_error());
		} 
        $ID = $_SESSION['hold'];
        $type = $_SESSION['stype'];

        $queryIn = "SELECT * FROM users WHERE `$type` LIKE '%$ID%'";
        $resultIn = mysqli_query($con, $queryIn);
        $row = mysqli_fetch_row($resultIn);
        $Fname = str_replace(' ', '&nbsp;', $row[3]);
        $Lname = str_replace(' ', '&nbsp;', $row[4]);
        $Pname = str_replace(' ', '&nbsp;', $row[5]);
        $shipName='&nbsp';
        $fleetName='&nbsp';
        if ($row[15]) {//ship
        	$queryShip = "SELECT * FROM ship WHERE ID = '$row[15]'";
			$resultShip= mysqli_query($con,$queryShip);
			$rowShip=mysqli_fetch_row($resultShip);
            $shipName = str_replace(' ', '&nbsp;', $rowShip[1]);
        }
        if ($row[16]) {//fleet
        	$queryFleet = "SELECT * FROM fleet WHERE ID = '$row[16]'";
			$resultFleet= mysqli_query($con,$queryFleet);
			$rowFleet=mysqli_fetch_row($resultFleet);
            $fleetName = str_replace(' ', '&nbsp;', $rowFleet[1]);
        }
        //echo $_POST['submit'];
        //echo $_POST['Edit'];
        ?>
    	<div class = "container" >
            <div class = "d-flex justify-content-center" id = "EditUser">
                <div class = "row">
                    <div class = "col-xl">
                    	<legend id="AcctInfoDisp">Account Information:</legend>
                       
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Edit"): 
                        ?>
                        <?php
                            if ($_POST["Edit"] == "First"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <input type="text"  name="name" value='<?php echo $Fname;?>' required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="First">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">Last Name: </label>
                                        <label> <?php echo $Lname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="Last">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                	<label style="padding-right: 4.6em">Ship or Household: </label>
                                    <label><?php echo $shipName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p> 
                                	<label style="padding-right: 4.6em">Fleet or Alliance: </label>
                                   	<label><?php echo $fleetName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Last"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <label><?php echo $Fname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="First">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">Last Name: </label>
                                        <input type="text" name="name" value=<?php echo $Lname;?> required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Last">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>

                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                	<label style="padding-right: 4.6em">Ship or Household: </label>
                                    <label><?php echo $shipName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p> 
                                	<label style="padding-right: 4.6em">Fleet or Alliance: </label>
                                    <label><?php echo $fleetName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Pirate"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <label><?php echo $Fname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="First">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 5em">Last Name: </label>
                                    <label><?php echo $Lname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Last">
                                </p>
                            </fieldset>
                        </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 4.6em">Pirate Name: </label>
                                        <?php if($Pname):?>
                                    		<input type="text" name="name" value=<?php echo $Pname;?> required>
                                    	<?php else: ?>
                                        	<input type="text" name="name" required>
                                        <?php endif; ?>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Pirate">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                	<label style="padding-right: 4.6em">Ship or Household: </label>
                                    <label><?php echo $shipName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p> 
                                	<label style="padding-right: 4.6em">Fleet or Alliance: </label>
                                    <label><?php echo $fleetName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>


                        <?php
                            elseif ($_POST["Edit"] == "Ship"):
                        ?>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 5em">First Name: </label>
	                                    <label><?php echo $Fname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="First">
	                            	</p>
	                            </fieldset>
	                        </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 5em">Last Name: </label>
	                                    <label><?php echo $Lname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Last">
	                            	</p>
	                            </fieldset>
	                        </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 4.6em">Pirate Name: </label>
	                                    <label><?php echo $Pname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Pirate">
	                            	</p>
	                            </fieldset>
	                        </form>
							<form method="POST">
                                <fieldset>
                                    <p>
                                    	<label style="padding-right: 4.6em">Ship or Household: </label>
                                    	<?php if($shipName=='&nbsp'):?>
                                    		<input type="text" name="name" required>
                                    	<?php else: ?>
                                        	<input type="text" name="name" value=<?php echo $shipName;?> required>
                                        <?php endif; ?>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Ship">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 4.6em">Fleet or Alliance: </label>
	                                    <label><?php echo $fleetName; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Fleet">
	                            	</p>
	                            </fieldset>
	                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Fleet"):
                        ?>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 5em">First Name: </label>
	                                    <label><?php echo $Fname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="First">
	                            	</p>
	                            </fieldset>
	                        </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 5em">Last Name: </label>
	                                    <label><?php echo $Lname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Last">
	                            	</p>
	                            </fieldset>
	                        </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 4.6em">Pirate Name: </label>
	                                    <label><?php echo $Pname; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Pirate">
	                            	</p>
	                            </fieldset>
	                        </form>
	                        <form method="POST">
	                            <fieldset>
	                            	<p>
	                            		<label style="padding-right: 4.6em">Ship or Household: </label>
	                                    <label><?php echo $shipName; ?></label>
	                                    <input type="submit" name="submit" value="Edit">
	                                    <input type="hidden" name="Edit" value="Ship">
	                            	</p>
	                            </fieldset>
	                        </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                    	<label style="padding-right: 4.6em">Fleet or Alliance: </label>
                                        <?php if($fleetName=='&nbsp'):?>
                                    		<input type="text" name="name" required>
                                    	<?php else: ?>
                                        	<input type="text" name="name" value=<?php echo $fleetName;?> required>
                                        <?php endif; ?>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Fleet">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                        <?php
                            endif;
                        ?>
                        <?php 
                            elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Confirm"):
                                if ($_POST['delim']=="First") {
                                    $name=mysqli_real_escape_string($con,$_POST['name']);
                                    $update = "UPDATE users SET Fname = '$name' WHERE `$type` LIKE '%$ID%'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }
                                else if ($_POST['delim']=="Last") {
                                    $name=mysqli_real_escape_string($con,$_POST['name']);
                                    $update = "UPDATE users SET Lname = '$name' WHERE `$type` LIKE '%$ID%'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }
                                else if ($_POST['delim']=="Pirate") {
                                    $name=mysqli_real_escape_string($con,$_POST['name']);
                                    $update = "UPDATE users SET Pname = '$name' WHERE `$type` LIKE '%$ID%'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }
                                else if ($_POST['delim']=='Ship') {
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
                            			$update = "UPDATE users SET shipC = '$IDnum[0]' WHERE `$type` LIKE '%$ID%'";
                                    	$temp=mysqli_query($con, $update);
                                    	$_SESSION['multsearch']=array('1');
                                    	header("Location: /PNPN-Website/editUser.php");
                            		}
                            		else {
                            			echo '<script type="text/javascript">alert("There are no ships that match that name.");</script>';
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
                            			$update = "UPDATE users SET fleetC = '$IDnum[0]' WHERE `$type` LIKE '%$ID%'";
                                    	$temp=mysqli_query($con, $update);
                                    	$_SESSION['multsearch']=array('1');
                                    	header("Location: /PNPN-Website/editUser.php");
                            		}
                            		else {
                            			echo '<script type="text/javascript">alert("There are no fleets that match that name.");</script>';
                            		}
                                	
							}

                        ?>
                        <?php 
                            else: 
                        ?>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 5em">First Name: </label>
                                    <label><?php echo $Fname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="First">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 5em">Last Name: </label>
                                    <label><?php echo $Lname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Last">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 4.6em">Ship or Household: </label>
                                    <label><?php echo $shipName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 4.6em">Fleet or Alliance: </label>
                                    <label><?php echo $fleetName; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                            	</p>
                            </fieldset>
                        </form>
                        <?php
                            endif;
                        ?>
                        <div class="col">
                        <a href="/PNPN-Website/teller.php" style="text-decoration: none; color: black; align-content: center">Back to Teller Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

