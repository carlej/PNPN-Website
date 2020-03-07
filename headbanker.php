<!doctype html>
<html>
	<head>
		<?php
		include("Javascript/Connections/req.php");
		if ($_SESSION['username']!="todd_135791@yahoo.com" && $_SESSION['perm']!="z") {
			?><script type="text/javascript">window.location.href="bank.php"</script><?php
		}
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
			$username = $_SESSION['username'];
			$perm = $_SESSION['perm'];
		}
		date_default_timezone_set('Etc/GMT+8');
		$timeStamp= new DateTime();

		/*if ($perm!='z') {
			echo '<script type="text/javascript">window.location.href="bank.php"</script>';
		}
		else if ($perm=='z'):*/
		?>

		<title>Head Banker</title>
		<?php 
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		include("Views\Partials/header.php");?>

	<head>
		<!-- Creates the Personal, Teller, and Head Banker Buttons -->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
				<div class = "d-flex justify-content-center">
					<div class = "row" id ="ButtonsRow">
						<div class = "col" style="padding-right: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="bank.php" class="LeftButtonThreeUn">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MiddleButtonThreeUn">Teller</a>
							<?php endif;?>
						</div>
						<div class = "col" style = "padding-left: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="headbanker.php" class="RightButtonThreePressed">Head Banker</a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Code for the Personal, Teller, and Head Banker Buttons once the page is shrunk-->
		<div class = "container" id = "SwitchButtonsMenuTwoThree">
			<div class="d-lg-none">
				<div class = "d-flex justify-content-center">
					<div class = "row">
						<div class = "col-lg">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="bank.php" class="MenuButtonUn">Personal</a>
							<?php endif;?>
						</div>
						<div class = "col-lg" style = "padding-left: 0.05em;">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="teller.php" class="MenuButtonUn">Teller</a>
							<?php endif;?>
						</div>
						<div class = "col-lg">
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && ($_SESSION['username']=="todd_135791@yahoo.com" || $_SESSION['perm']=="z")): ?>
								<a href="headbanker.php" class="MenuButtonPressed">Head Banker</a>
							<?php endif;?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</head>

	<body>
		<form method="POST">
			<fieldset>
				<div class = "container" id="AuditSearchBy">
					<div class = "d-flex-row">
						<div calss = "col">
							<div class="AuditName">Audit:</div>
							<select name="sort" style="margin-left: 1em; margin-bottom: 0.5em">
								<option>Sort By:</option>
								<option value="teller">Teller</option>
								<option value="time">Time</option>
								<option value="amount">Amount over</option>
								<option value="type">Type</option>
							</select>
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Sort" class="submit">
							<input type="hidden" name="start">
							<input type="hidden" name="end">
							<input type="hidden" name="teller">
							<input type="hidden" name="amount">
							<input type="hidden" name="type">
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Sort") {
			$method = $_POST['sort'];
			$queryIn = "SELECT history FROM accounts WHERE ID = '330425394'"; //real one
			//$queryIn = "SELECT history FROM accounts WHERE ID = '555555555'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_hist = json_decode($row[0],true);
			if ($_POST['sort']=='teller') {
				$teller = json_decode($row[0],true);
				$unique = array_unique(array_map(function ($i) { return $i[3]; }, $teller));
				if (!$_POST['teller']) {?>
					<form method="POST">
						<fieldset>
							<div class = "container" id="AuditSearchBy">
								<div class = "d-flex-row">
									<div calss = "col">
										<label id="SelectTeller">Select Teller: </label>
										<select name="teller" style="margin-left: 1em;  ; margin-bottom: 0.5em; font-size: 1.1em">
											<?php foreach ($unique as $key => $value) {//this will desplay the name of each captain as each should be different
											//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
											$capname=str_replace(' ', '&nbsp;', $value);
											echo '<option value="'.$value.'">'.$capname.'</option>';
											} ?>
										</select>
											<input type="submit" name= "submit" value="Sort" >
											<input type="hidden" name="sort" value="teller">
											<input type="hidden" name="start">
											<input type="hidden" name="end">
											<input type="hidden" name="amount">
											<input type="hidden" name="type">
										</div>
									</div>
								</div>
						</fieldset>
					</form><?php
				}
				//$parsed_hist=array_reverse($temphist);
				if ($_POST['teller']) {
					$tell = $_POST['teller'];
					//$numResults=-1;
					array_multisort(array_map(function($i) {
						return $i[3];
					}, $parsed_hist), SORT_ASC, $parsed_hist);
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost?><div class="container" id="HistBox"><?php
					foreach ($parsed_hist as $key => $value) {
						
						$date = new DateTime($key);
						//echo $date;
						//echo $timeStamp;
						$diff=date_diff($date,$timeStamp);
						if ($diff->format("%a")<30 && $value[3]==$tell) { //doesnt display if date is too old in days
							echo '<li><a>';
							if (count($value)==6) {//transfer display from teller
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								echo " to ";
								echo $value[2]; //account to
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							if (count($value)==7) {//deposit display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings to ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							else if (count($value)==8) {//withdraw display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							echo '</a></li>';
						}
					}?></div><?php
				}
			}
			else if ($_POST['sort']=='time') {
				//way date is stored $timeStamp=date('Y/m/d H:i:s');
				if ($_POST['end'] && $_POST['start']) {
					$endHold = $_POST['end'];
					$startHold = $_POST['start'];
					$startTemp = new DateTime($startHold);
					$endTemp = new DateTime($endHold);
					$hold=false;
					$start=date_diff($startTemp,$timeStamp);
					//echo $start->format("%a");
					if ($endTemp>$timeStamp) {
						$end = $timeStamp;
					}
					else
						$end=date_diff($endTemp,$timeStamp);
					//echo (-$end->format("%a"));
					//$numResults=-1;
					array_multisort(array_map(function($i) {
						return $i[4];
					}, $parsed_hist), SORT_ASC, $parsed_hist);
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost?><div class="container" id="HistBox"><?php
					foreach ($parsed_hist as $key => $value) {
						
						$date = new DateTime($key);
						//echo $date;
						//echo $timeStamp;
						$diff=date_diff($date,$timeStamp);

						if ($diff->format("%a")<=$start->format("%a") && $diff->format("%a")>=$end->format("%a")) {
							$hold=true;
							echo '<li><a>';
							if (count($value)==6) {//transfer display from teller
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								echo " to ";
								echo $value[2]; //account to
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							if (count($value)==7) {//deposit display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings to ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							else if (count($value)==8) {//withdraw display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							echo '</a></li>';
						}
					}?></div><?php
					if (!$hold) {
						?>
						<p>There are no records between those dates!</p><?php
					}
				}
				else if (!$_POST['end'] xor !$_POST['start']) {
					?>
					<p>Please input both a start and end date</p>
					<form method="POST">
						<fieldset>
							<div class = "container">
								<div class = "d-flex-row">
									<div calss = "col" style="font-family: pirates; font-size: 1em; margin-left: 1em; margin-bottom: 0.5em;">
										<label style="margin-bottom: 0em;">Start Date: </label>
										<input type="date" name="start">
										<label style="margin-bottom: 0em;">End Date: </label>
										<input type="date" name="end">
										<input type="submit" name= "submit" value="Sort" >
										<input type="hidden" name="sort" value="time">
										<input type="hidden" name="teller">
										<input type="hidden" name="amount">
										<input type="hidden" name="type">
									</div>
								</div>
							</div>
						</fieldset>
					</form>
					<?php
				}
				else{
					?>
					<form method="POST">
						<fieldset>
							<div class = "container">
								<div class = "d-flex-row">
									<div calss = "col" style="font-family: pirates; font-size: 1em; margin-left: 1em; margin-bottom: 0.5em;">
										<label style="margin-bottom: 0em;">Start Date: </label>
										<input type="date" name="start">
										<label style="margin-bottom: 0em;">End Date: </label>
										<input type="date" name="end">
										<input type="submit" name= "submit" value="Sort" >
										<input type="hidden" name="sort" value="time">
										<input type="hidden" name="teller">
										<input type="hidden" name="amount">
										<input type="hidden" name="type">
									</div>
								</div>
							</div>
						</fieldset>
					</form>
					<?php 
				}
			}
			else if ($_POST['sort']=='amount') {
				if (!$_POST['amount']) {?>
					<form method="POST">
						<fieldset>
							<div class = "container">
								<div class = "d-flex-row">
									<div calss = "col" style="font-family: pirates; font-size: 1em; margin-left: 1em; margin-bottom: 0.5em;">
										<label style="margin-bottom: 0em;">Enter Max Amount: </label>
										<input type="number" name="amount" min="1">
										<input type="submit" name= "submit" value="Sort" >
										<input type="hidden" name="sort" value="amount">
										<input type="hidden" name="start">
										<input type="hidden" name="end">
										<input type="hidden" name="teller">
										<input type="hidden" name="type">
									</div>
								</div>
							</div>
						</fieldset>
					</form><?php
				}
				//$parsed_hist=array_reverse($temphist);
				if ($_POST['amount']) {
					$amount = $_POST['amount'];
					$hold=false;
					//$numResults=-1;
					array_multisort(array_map(function($i) {
						return $i[4];
					}, $parsed_hist), SORT_ASC, $parsed_hist);
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost?><div class="container" id="HistBox"><?php
					foreach ($parsed_hist as $key => $value) {
						
						$date = new DateTime($key);
						//echo $date;
						//echo $timeStamp;
						$diff=date_diff($date,$timeStamp);
						if ($diff->format("%a")<30 && $value[4]>$amount) {
							$hold=true;
							echo '<li><a>';
							if (count($value)==6) {//transfer display from teller
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								echo " to ";
								echo $value[2]; //account to
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							if (count($value)==7) {//deposit display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings to ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							else if (count($value)==8) {//withdraw display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							echo '</a></li>';
						}
					}?></div><?php
					if (!$hold) {
						?>
						<p>There are no records with amounts greater then the the chosen amount!</p><?php
					}
				}
			}
			else if ($_POST['sort']=='type') {
				if (!$_POST['type']) {?>
					<form method="POST">
						<fieldset>
							<div class = "container">
								<div class = "d-flex-row">
									<div calss = "col" style="font-family: pirates; font-size: 1em; margin-left: 1em; margin-bottom: 0.5em;">
										<label style="margin-bottom: 0em;">Select Type: </label>
										<select name="type" style=" margin-bottom: 0.5em; font-size: 1.1em">
											<option value="Transfered">Transfer</option>
											<option value="Deposited">Deposit</option>
											<option value="Withdrew">Withdraw</option>
										</select>
										<input type="submit" name= "submit" value="Sort" >
										<input type="hidden" name="sort" value="type">
										<input type="hidden" name="start">
										<input type="hidden" name="end">
										<input type="hidden" name="amount">
										<input type="hidden" name="teller">
									</div>
								</div>
							</div>
						</fieldset>
					</form><?php
				}
				//$parsed_hist=array_reverse($temphist);
				if ($_POST['type']) {
					$type = $_POST['type'];
					$hold=false;
					//$numResults=-1;
					array_multisort(array_map(function($i) {
						return $i[0];
					}, $parsed_hist), SORT_ASC, $parsed_hist);
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost?><div class="container" id="HistBox"><?php
					foreach ($parsed_hist as $key => $value) {
						
						$date = new DateTime($key);
						//echo $date;
						//echo $timeStamp;
						$diff=date_diff($date,$timeStamp);
						if ($diff->format("%a")<30 && $value[0]==$type) {
							$hold=true; //doesnt display if date is too old in days
							echo '<li><a>';
							if (count($value)==6) {//transfer display from teller
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[4]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								echo " to ";
								echo $value[2]; //account to
								if ($value[5]) {
									echo " Notes: ";
									echo $value[5];
								}							
							}
							if (count($value)==7) {//deposit display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[2]; //amount 
								echo " Sterlings to ";
								echo $value[1]; //account from
								if ($value[4]) {
									echo " Notes: ";
									echo $value[4];
								}							
							}
							else if (count($value)==8) {//withdraw display
								echo "~ ";
								echo $key; //time and date that it happened
								echo " ~ ";
								echo " Teller ";
								echo $value[3];
								echo " ";
								echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
								echo " ";
								echo $value[2]; //amount 
								echo " Sterlings from ";
								echo $value[1]; //account from
								if ($value[4]) {
									echo " Notes: ";
									echo $value[4];
								}							
							}
							echo '</a></li>';
						}
						
					}?></div><?php
					if (!$hold) {
						?><p>There are no records with amounts greater then the the chosen amount!</p><?php
					}
				}
			}
		}
		//endif; ?>
		
		<form method="POST">
			<fieldset>
				<div class = "container"  id="AddRemoveTeller">
					<div class = "d-flex-row">
						<div calss = "col">
							<label style="font-size: 1.5em">Add or Remove Teller Access:</label>
							<div class="col" style="margin-bottom: 0.5em;">
								<select name="type">
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
						</div>
						<div class = "col" style="margin-bottom: 0.5em;">
							<input type="search" class="required" name="input" id= "SearchBox">
						</div>
						<div class = "col" style="margin-bottom: 0.5em;">
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
                 		 <div class = "container" style="font-family: pirates; font-size: 1.2em;">
							<div class = "d-flex-row">
								<div calss = "col">
			                        <p>
			                            <label style="padding-right: 5em">Email: </label>
			                            <label> <?php echo $row[0]; ?></label>
			                        </p>
			                    </div>
			                </div>
			            </div>
                    </fieldset>
                </form>
                <form method="POST">
                    <fieldset>
                    	<div class = "container" style="font-family: pirates; font-size: 1.2em">
							<div class = "d-flex-row">
								<div calss = "col">
			                        <p>
			                            <label style="padding-right: 5em">Permissions: </label>
			                            <label><?php echo $row[9]; ?></label>
			                            <input type="submit" name="submit" value="Edit">
			                        </p>
			                    </div>
			                </div>
			            </div>
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
					<div class = "container" style="font-family: pirates; font-size: 1.2em">
						<div class = "d-flex-row">
							<div calss = "col">
								<select name="perm">
									<option>Select Permission level:</option>
									<option value="a">Normal</option>
									<option value="b">Teller</option>
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
?>
		
	</body>

</html>
