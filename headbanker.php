<!doctype html>
<html>
	<head>
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
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

		<title>HeadBanker</title>
		<?php 
		include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
				die('Could not connect: ' . mysql_error());
			}
		include("Views\Partials/header.php");?>

<!-- Creates the Personal, Teller, and Head Banker Buttons -->
		<div class = "container-flow" id = "SwitchButtonsThree">
			<div class="d-none d-lg-block">
				<div class = "d-flex justify-content-center">
					<div class = "row" id ="ButtonsRow">
						<div class = "col" style="padding-right: 0.05em;">
							<a href="bank.php" class="LeftButtonThreeUn">Personal</a>
						</div>
						<div class = "col" style = "padding-left: 0.05em; padding-right: 0.05em">
							<a href="teller.php" class="MiddleButtonThreeUn">Teller</a>
						</div>
						<div class = "col" style = "padding-left: 0.05em;">
							<a href="headbanker.php" class="RightButtonThreePressed">Head Banker</a>
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
							<a href="bank.php" class="MenuButtonUn">Personal</a>
						</div>
						<div class = "col-lg" style = "padding-left: 0.05em;">
							<a href="teller.php" class="MenuButtonUn">Teller</a>
						</div>
						<div class = "col-lg">
							<a href="headbanker.php" class="MenuButtonPressed">Head Banker</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<body>
		<form method="POST">
			<fieldset>
				<div class = "container" id="SearchBy">
					<div class = "d-flex-row">
						<div calss = "col">
							<div style="font-size: 1.3em; font-family: pirates; border-bottom: 0.05em solid black; width: 20%; margin-bottom: 1em;">Audit:</div>
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
							<input type="hidden" name="time">
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
							<label style="margin-bottom: 0em;">Select Teller: </label>
							<select name="teller" style=" margin-bottom: 0.5em; font-size: 1.1em">
								<?php foreach ($unique as $key => $value) {//this will desplay the name of each captain as each should be different
								//echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
								$capname=str_replace(' ', '&nbsp;', $value);
								echo '<option value="'.$value.'">'.$capname.'</option>';
								} ?>
							</select>
								<input type="submit" name= "submit" value="Sort" >
								<input type="hidden" name="sort" value="teller">
								<input type="hidden" name="time">
								<input type="hidden" name="amount">
								<input type="hidden" name="type">
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
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost
					foreach ($parsed_hist as $key => $value) {
						$tempD = strtotime($key);
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
					}
				}
			}
			else if ($_POST['sort']=='time') {
				//way date is stored $timeStamp=date('Y/m/d H:i:s');

				//this would not work
				/*if (!$_POST['time']) {?>
					<form method="POST">
						<fieldset>
							<label style="margin-bottom: 0em;">Select Start Time: </label>
							<li>
							<label style="margin-bottom: 0em;">Month: </label>
								<select name="type" style=" margin-bottom: 0.5em; font-size: 1.1em">
									<option value="1">January</option>
									<option value="2">Febuary</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</li>
								<input type="submit" name= "submit" value="Sort" >
								<input type="hidden" name="sort" value="type">
								<input type="hidden" name="time">
								<input type="hidden" name="amount">
								<input type="hidden" name="teller">
						</fieldset>
					</form><?php
				}*/
			}
			else if ($_POST['sort']=='amount') {
				if (!$_POST['amount']) {?>
					<form method="POST">
						<fieldset>
							<label style="margin-bottom: 0em;">Enter Max Amount: </label>
								<input type="number" name="amount" min="1">
								<input type="submit" name= "submit" value="Sort" >
								<input type="hidden" name="sort" value="amount">
								<input type="hidden" name="time">
								<input type="hidden" name="teller">
								<input type="hidden" name="type">
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
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost
					foreach ($parsed_hist as $key => $value) {
						$tempD = strtotime($key);
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
					}
					if (!$hold) {
						?><p>There are no records with amounts greater then the the chosen amount!</p><?php
					}
				}
			}
			else if ($_POST['sort']=='type') {
				if (!$_POST['type']) {?>
					<form method="POST">
						<fieldset>
							<label style="margin-bottom: 0em;">Select Type: </label>
							<select name="type" style=" margin-bottom: 0.5em; font-size: 1.1em">
								<option value="Transfered">Transfer</option>
								<option value="Deposited">Deposit</option>
								<option value="Withdrew">Withdraw</option>
							</select>
								<input type="submit" name= "submit" value="Sort" >
								<input type="hidden" name="sort" value="type">
								<input type="hidden" name="time">
								<input type="hidden" name="amount">
								<input type="hidden" name="teller">
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
					//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost
					foreach ($parsed_hist as $key => $value) {
						$tempD = strtotime($key);
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
						
					}
					if (!$hold) {
						?><p>There are no records with amounts greater then the the chosen amount!</p><?php
					}
				}
			}
		}
		//endif; ?>
		
	</body>

</html>
