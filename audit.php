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

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Welcome</title>
		<?php 
		include("Javascript/Connections/req.php");
		include 'Javascript/Connections/convar.php';
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
							<select name="sort" style="margin-left: 1em; margin-bottom: 0.5em">
								<option>Sort By:</option>
								<option value="teller">Teller</option>
								<option value="time">Time</option>
								<option value="amount">Amount</option>
								<option value="type">Type</option>
							</select>
						</div>
						<div class = "col">
							<input type="submit" name= "submit" value="Sort" class="submit">
						</div>
					</div>
				</div>
			</fieldset>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Sort") {
			$method = $_POST['sort'];
			//$queryIn = "SELECT history FROM accounts WHERE ID = '330425394'"; //real one
			$queryIn = "SELECT history FROM accounts WHERE ID = '555555555'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_hist = json_decode($row[0],true);
			//$parsed_hist=array_reverse($temphist);
			if ($_POST['sort']=="teller") {
				//$numResults=-1;
				array_multisort(array_map(function($element) {
					return $element[3];
				}, $parsed_hist), SORT_ASC, $parsed_hist);
				//$temp = usort($parsed_hist, function($a, $b){ return strcmp($a[3], $b[3]); }); //datetime key lost
				foreach ($parsed_hist as $key => $value) {
					$tempD = strtotime($key);
					$date = new DateTime($key);
					//echo $date;
					//echo $timeStamp;
					$diff=date_diff($date,$timeStamp);
					if ($diff->format("%a")<30) { //doesnt display if date is too old
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
			}
			/* search and return all unique values from multidementional array
			$temp = array_unique(array_map(function ($i) { return $i[3]; }, $parsed_hist));
			if ($_POST['sort']=="teller") {

				foreach ($temp as $key => $value) {
					echo '<p>'.$value.'</p>';
				}
			}*/
			else if ($_POST['sort']=='time') {
				# code...
			}
			else if ($_POST['sort']=='amount') {
				# code...
			}
			else if ($_POST['sort']=='type') {
				# code...
			}
		}
		//endif; ?>
		
	</body>

</html>
