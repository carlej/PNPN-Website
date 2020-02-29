<!doctype html>
<html>
	<head>
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			$username = $_SESSION['username'];
			$perm = $_SESSION['perm'];
		}

		/*if ($perm!='z') {
			echo '<script type="text/javascript">window.location.href="bank.php"</script>';
		}
		else if ($perm=='z'):*/
		?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Welcome Omega</title>
		<?php 
		include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		include("Views\Partials/header.php");?>

	<body>
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div calss = "col-2">
							<select name="type" style="margin-left: 1em; margin-bottom: 0.5em">
								<option>Search By:</option>
								<option value="Pname">Pirate Name</option>
								<option value="Fname">First Name</option>
								<option value="Lname">Last Name</option>
								<option value="Username">Email</option>
								<option value="shipID" style="display:none;">shipID</option>
								<option value="Ship" style="display:none;">Ship/House</option>
								<option value="fleetID" style="display:none;">fleetID</option>
								<option value="Fleet" style="display:none;">Fleet/Alliance</option>
							</select>
						</div>
						<div class = "col" style="margin-bottom: 0.5em; font-family: ariel">
							<input type="search" class="required" name="input" id= "SearchBox">
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Search" class="submit">
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
			$method = $_POST['type'];
			$input = mysqli_real_escape_string($con, $_POST['input']);
			$queryIn = "SELECT * FROM users WHERE `$method` LIKE '%$input%'";
			$resultIn = mysqli_query($con, $queryIn);
			if (mysqli_num_rows($resultIn)>1) {
				$array = NULL;
				$array = $resultIn->fetch_all(MYSQLI_NUM);?>
				<form method = "POST">
					<fieldset>
						<div class = "container" id = "Search" >
							<div class = "d-flex-row">
								<div class = "SSearch">
								<?php echo '<label>Search by: </label><select name="input">';
								foreach ($array as $key => $value) {
								echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
								}
								$input2 = mysqli_real_escape_string($con, $_POST['input']);
								echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Search"><input type="hidden" name="type" value="Username"><input type="hidden" name="new" value="1">';?>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			<?php }
			else if (mysqli_num_rows($resultIn)==1) {
				$row = mysqli_fetch_row($resultIn);?>
				<form method="POST">
                 	<fieldset>
                        <p>
                            <label style="padding-right: 5em">Email: </label>
                            <label> <?php echo $row[0]; ?></label>
                        </p>
                    </fieldset>
                </form>
                <form method="POST">
                    <fieldset>
                        <p>
                            <label style="padding-right: 5em">Permissions: </label>
                            <label><?php echo $row[9]; ?></label>
                            <input type="submit" name="submit" value="Edit">
                        </p>
                    </fieldset>
                </form>
                <?php
				 ?>
				<?php
				$_SESSION['hold']=$input;
				$_SESSION['stype']=$method;
				mysqli_close($con);
				$_SERVER["REQUEST_METHOD"]=NULL;
				
			}
			else{
				echo '<div class="container" id = "NoneFound">
							There are no accounts that match that search!
					</div>';
			}
		}
		else if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Edit"){?>
			<form method="POST">
				<fieldset>
					<div class = "container">
						<div class = "d-flex-row">
							<div calss = "col-2">
								<select name="perm" style="margin-left: 1em; margin-bottom: 0.5em">
									<option>Select Permission level:</option>
									<option value="a">Normal</option>
									<option value="b">Teller</option>
									<option value="c">Volenteer coord</option>
									<option value="d">Land Steward</option>
									<option value="z">Omega</option>
								</select>
							</div>
							<div class = "col">
								<input type="submit" name= "submit" value="Change" class="submit">
							</div>
						</div>
					</div>
				</fieldset>
			</form>
			<?php
		}
		else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Change") {
			$input=$_SESSION['hold'];
			$method=$_SESSION['stype'];
			$perm=mysqli_real_escape_string($con,$_POST['perm']);
            $update = "UPDATE users SET AccountPerm = '$perm' WHERE `$method` LIKE '%$input%'";
            $temp=mysqli_query($con, $update);
            echo '<script type="text/javascript">window.location.href="admin.php"</script>';
		}
		
		//endif; ?>
		
	</body>

</html>
