<?php 
foreach ($parsed_json as $value) {
	if ($value) {
		$queryIn = "SELECT history FROM accounts WHERE ID = '$value'";
		$resultIn = mysqli_query($con, $queryIn);
		$row = mysqli_fetch_row($resultIn);
		$parsed_hist = json_decode($row[0],true);
//		$test=array_values($parsed_hist);
//		echo date("Y/m/d H:m:s",time());
//		$date=date_create();
//		date_timestamp_set($date,time());
//		echo date_format($date,"Y/m/d H:i:s");
//		echo time();
//		echo date("Y/m/d H:i:s");	
	}
}
?>
<?php if($parsed_hist!=NULL): ?>
	<?php foreach ($parsed_hist as $key => $value): ?>
		<div class="container">
			<div class="cssmenu" class="align-center">
				<ul>
					<li><a><?php echo $key; //tiem and date that it happened
					echo $value[0]; //what type of history is it ex transfer, deposite, withdraw 
					echo $value[1]; //account from
					echo $value[2]; //account to
					echo $value[3]; //amount
					?></a></li>
				</ul>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>