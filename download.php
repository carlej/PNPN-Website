<!doctype html>
<html>
	<head>

		<?php include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		if ($_SESSION['perm']!="b" && $_SESSION['perm']!="z") {
		    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if ($_SESSION['perm'] != 'z') { ?>
			<script type="text/javascript">window.location.href="bank.php"</script> <?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true || $_SESSION['perm'] =="z") {
			$usename = $_SESSION['username'];
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		}
		else{
			echo "Please login to view this page.";
			header("Location: bank.php");
		}
		if ($_SESSION['clear']!=$_SERVER['PHP_SELF']) {
			include "Javascript/clear.php";
		}
		$_SESSION['clear']=$_SERVER['PHP_SELF'];
		?>

		<title>DOWNLOAD</title>
		<?php include("Views/Partials/header.php");?>
	
	</head>
	<body class = "TellerAccounts">
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
			//include 'Javascript/Connections/convar.php';
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		}


		//creates the basic inputs for the search file to find an user/account?>
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div class = "col" style="margin-bottom: 0.5em;">
							<div><label>Download Volunteer Shifts for:</label></div>
							<select name="type" style="margin-left: 1em; margin-bottom: 0.5em">
								<option value="july">Port Nassau</option>
								<option value="september">Tortuga</option>
							</select>
							<!-- <input type="search" class="required" name="input" id= "SearchBox" minlength="3"> -->
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Launch" class="submit">
						</div>
					</div>
				</div>
			</fieldset>
		</form>

		<?php 
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Launch") {
			$event = $_POST['type'];
			$eventType = NULL;
			if ($_POST['type'] == 'july'){
				$eventType = 'Nassau';
			}
			else{
				$eventType = 'Tortuga';
			}
			$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
			file_put_contents('file.txt', "\r\n");
			$fp = fopen('file.txt', 'a+');
			$query = "SELECT * FROM jobs";
			$result= mysqli_query($con,$query);
			$array=NULL;
			$array = $result->fetch_all(MYSQLI_NUM);
			$job = array(
				array('Set-Up', 'Set Up'),
				array('Gate', 'Registration', 'Cat Herder', 'Dragon Herder'),
				array('Parking', 'General Parking', 'Main Gate', 'Rover', 'Front Lot', 'Front Line', 'Overnight Watch'),
				array('Saftey', 'Rover', 'Gate Sentry', 'Station'),
				array('Fire', 'Cigarette Butt Turn In', 'Butt Can Checks'),
				array('Bank', 'Teller'),
				array('Scuttlebutt', 'Skuttler'),
				array('Titles', 'Titler'),
				array('Sanitation', 'Biffy Checks', 'Trash Checks'),
				array('Hearld', 'Hearld'),
				array('Lost Cove', 'Attendant'),
				array('Monkey Island', 'Attendant'),
				array('Tear Down', 'Tear Down'));
			if (mysqli_num_rows($result)>0) {
				foreach($job as $row=>$val){
			    	foreach($val as $col=>$v){
			    		if ($col) {
			    			fwrite($fp , $job[$row][0]);
			    			fwrite($fp , ": ");
			    			fwrite($fp , $job[$row][$col]);
			    			fwrite($fp, "\r\n");
			    			fwrite($fp, "PAY  DAY       START     END    CHECK IN  Check Out NAME\r\n");
				    		foreach ($array as $key => $value) {
								$date = date_create($value[4]);
								error_reporting(0);
								if (date_format($date, "m") == date("m", strtotime($event)) && $value[1] == $job[$row][0] && $value[2] == $job[$row][$col]){
									fwrite($fp , $value[3]);
									fwrite($fp , "  ");
									$date = date_create($value[4]);
									$sdate = date_format($date, "m/d/y");
									fwrite($fp , $sdate); //day
									fwrite($fp , "  ");
									$sdate = date_format($date, "h:i A");
									fwrite($fp , $sdate); //start
									$date = date_create($value[5]);
									fwrite($fp , "  ");
									$sdate = date_format($date, "h:i A");
									fwrite($fp , $sdate); //end
									fwrite($fp , "    __        __     ");
									if ($value[7] != NULL) {
										$queryIn = "SELECT * FROM users WHERE Username = '$value[7]'";
										$resultIn = mysqli_query($con, $queryIn);
										$row = mysqli_fetch_row($resultIn);
										if ($row[5]!=NULL) {
											$name=$row[5];
										}
										else{
											$name=$row[3].' '.$row[4];
										}
									}
									else
										$name = "EMPTY";
									fwrite($fp , $name);
									fwrite($fp , "\r\n");
									fwrite($fp , "\r\n");
								}
							}
			    		}
				    }
				}
				foreach ($array as $key => $value) {
					$date = date_create($value[4]);
					if (date_format($date, "m") == date("m", strtotime($event))){
						fwrite($fp , $value[3]);
						fwrite($fp , "  ");
						$date = date_create($value[4]);
						$sdate = date_format($date, "m/d/y");
						fwrite($fp , $sdate); //day
						fwrite($fp , "  ");
						$sdate = date_format($date, "h:i A");
						fwrite($fp , $sdate); //start
						$date = date_create($value[5]);
						fwrite($fp , "  ");
						$sdate = date_format($date, "h:i A");
						fwrite($fp , $sdate); //end
						fwrite($fp , "    __        __     ");
						if ($value[7] != NULL) {
							$queryIn = "SELECT * FROM users WHERE Username = '$value[7]'";
							$resultIn = mysqli_query($con, $queryIn);
							$row = mysqli_fetch_row($resultIn);
							if ($row[5]!=NULL) {
								$name=$row[5];
							}
							else{
								$name=$row[3].' '.$row[4];
							}
						}
						else
							$name = "EMPTY";
						fwrite($fp , $name);
						fwrite($fp , "\r\n");
						fwrite($fp , "\r\n");
					}
				}
			}
			fclose($fp);
			?>
			<div class = "d-flex justify-content-center" style="margin-left: -20.2em;">
				<div style="margin-bottom: 1em; font-family: pirates;">
					<p><a class="alone unpressed" style="width: 10em;" href="downScript.php?path=file.txt">File For <?php echo $eventType ?> Ready</a></p>
				</div>
			</div>
			<?php
		}
		mysqli_close($con);
		?>
	</body>

</html>
