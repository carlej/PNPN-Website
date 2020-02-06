<div class="HistBox">
<?php 
//foreach ($parsed_json as $value) {
//	if ($value) {
//		$queryIn = "SELECT history FROM accounts WHERE ID = '$value'";
//		$resultIn = mysqli_query($con, $queryIn);
//		$row = mysqli_fetch_row($resultIn);
//		$parsed_hist = json_decode($row[0],true);	
//	}
//}
//$parsed_ship_hist=NULL;
//$parsed_fleet_hist=NULL;
//if ($parsed_ship_json!=NULL) {
//	foreach ($parsed_ship_json as $value) {
//		if ($value) {
//			$queryIn = "SELECT history FROM accounts WHERE ID = '$value'";
//			$resultIn = mysqli_query($con, $queryIn);
//			$row = mysqli_fetch_row($resultIn);
//			$parsed_ship_hist = json_decode($row[0],true);	
//		}
//	}
//}
//if ($parsed_fleet_json!=NULL) {
//	foreach ($parsed_fleet_json as $value) {
//		if ($value) {
//			$queryIn = "SELECT history FROM accounts WHERE ID = '$value'";
//			$resultIn = mysqli_query($con, $queryIn);
//			$row = mysqli_fetch_row($resultIn);
//			$parsed_fleet_hist = json_decode($row[0],true);	
//		}
//	}
//}
?>
<?php foreach($parsed_json as $acc):
	$parsed_hist=NULL;
	if ($acc) {
	 	$queryIn = "SELECT history FROM accounts WHERE ID = '$acc'";
		$resultIn = mysqli_query($con, $queryIn);
		$row = mysqli_fetch_row($resultIn);
		$parsed_hist = json_decode($row[0],true);
	 } ?>
	<?php if($parsed_hist!=NULL): ?>
		<?php foreach ($parsed_hist as $key => $value): ?>
			<div class="container">
				<div class="cssmenu" class="align-center">
					<ul>
						<li><a><?php
						//echo count($value);
						if (count($value)==5) {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo " Teller ";
							echo $value[4];
							echo " ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to							
							
						}
						else {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to
						}
						?></a></li>
					</ul>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endforeach; ?>
<?php if($parsed_ship_json!=NULL): ?>
	<?php foreach($parsed_ship_json as $acc):
		$parsed_ship_hist=NULL;
		if ($acc) {
		 	$queryIn = "SELECT history FROM accounts WHERE ID = '$acc'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_ship_hist = json_decode($row[0],true);
		 } ?>
		<?php if($parsed_ship_hist!=NULL): ?>
			<?php foreach ($parsed_ship_hist as $key => $value): ?>
				<div class="container">
					<div class="cssmenu" class="align-center">
						<ul>
							<li><a><?php
							if (count($value)==5) {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo " Teller ";
							echo $value[4];
							echo " ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to							
							
						}
						else {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to
						}
							?></a></li>
						</ul>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
<?php if($parsed_fleet_json!=NULL): ?>
	<?php foreach($parsed_fleet_json as $acc):
		$parsed_fleet_hist=NULL;
		if ($acc) {
		 	$queryIn = "SELECT history FROM accounts WHERE ID = '$acc'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_fleet_hist = json_decode($row[0],true);
		 } ?>
		<?php if($parsed_fleet_hist!=NULL): ?>
			<?php foreach ($parsed_fleet_hist as $key => $value): ?>
				<div class="container">
					<div class="cssmenu" class="align-center">
						<ul>
							<li><a><?php
							if (count($value)==5) {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo " Teller ";
							echo $value[4];
							echo " ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to							
							
						}
						else {
							echo "~ ";
							echo $key; //time and date that it happened
							echo " ~ ";
							echo $value[0]; //what type of history is it ex transfer, deposite, withdraw
							echo " ";
							echo $value[3]; //amount 
							echo " Sterlings from ";
							echo $value[1]; //account from
							echo " to ";
							echo $value[2]; //account to
						}
							?></a></li>
						</ul>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
</div>