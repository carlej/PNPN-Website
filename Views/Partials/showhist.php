
<div class="container" id="HistBox">
	<div style="font-size: 1.4em; text-align: center;">Records (Click Account Above)</div>

<?php 

?>
<?php foreach($parsed_json as $acc):
	//$parsed_hist=NULL;
	if ($acc) {
	 	$queryIn = "SELECT * FROM accounts WHERE ID = '$acc'";
		$resultIn = mysqli_query($con, $queryIn);
		$row = mysqli_fetch_row($resultIn);
		$parsed_hist = json_decode($row[2],true);
	 } ?>
	<?php if($parsed_hist!=NULL): ?>
		<?php $revPers=array_reverse($parsed_hist); ?>
			<div class = "d-flex justify-content-left" style="margin-left: -2.2em;">
			<div class = "row">
			<div class = "col-12">
				<ul  id="persHistShow" style="display: none; padding-top: 1em;">
					<?php foreach ($revPers as $key => $value): ?>
						<li><a><?php
						//echo count($value);
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
						else if (count($value)==5){//transfer display
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
							if ($value[4]) {
								echo " Notes: ";
								echo $value[4];
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
						?></a></li>
					
					<?php endforeach; ?>
				</ul>
			</div>
			</div>
			</div>
	<?php endif; ?>
<?php endforeach; ?>
<?php if($parsed_ship_json!=NULL): ?>
	<?php foreach($parsed_ship_json as $acc):
		$parsed_ship_hist=NULL;
		if ($acc) {
		 	$queryIn = "SELECT * FROM accounts WHERE ID = '$acc'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_ship_hist = json_decode($row[2],true);
		 } ?>
		<?php if($parsed_ship_hist!=NULL): ?>
			<?php $revShip=array_reverse($parsed_ship_hist); ?>
				<div class = "d-flex justify-content-left" style="margin-left: -2.2em;">
				<div class = "row">
				<div class = "col-12">
					<ul id="shipHistShow" style="display: none; padding-top: 1em;">
						<?php foreach ($revShip as $key => $value): //echo count($value); ?>
							<li><a><?php
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
						if (count($value)==5){//transfer display
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
							if ($value[4]) {
								echo " Notes: ";
								echo $value[4];
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
							?></a></li>
						
					<?php endforeach; ?>
				</ul>
			</div>
			</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
<?php if($parsed_fleet_json!=NULL): ?>
	<?php foreach($parsed_fleet_json as $acc):
		$parsed_fleet_hist=NULL;
		if ($acc) {
		 	$queryIn = "SELECT * FROM accounts WHERE ID = '$acc'";
			$resultIn = mysqli_query($con, $queryIn);
			$row = mysqli_fetch_row($resultIn);
			$parsed_fleet_hist = json_decode($row[2],true);
		 } ?>
		<?php if($parsed_fleet_hist!=NULL): ?>
			<?php $revfleet=array_reverse($parsed_fleet_hist); ?>
				<div class = "d-flex justify-content-left" style="margin-left: -2.2em;">
				<div class = "row">
				<div class = "col-12">
					<ul id="fleetHistShow" style="display: none; padding-top: 1em;">
						<?php foreach ($revfleet as $key => $value): ?>
							<li><a><?php
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
						else if (count($value)==5){//transfer display
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
							if ($value[4]) {
								echo " Notes: ";
								echo $value[4];
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
							?></a></li>
						
					<?php endforeach; ?>
				</ul>
			</div>
			</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

</div>
