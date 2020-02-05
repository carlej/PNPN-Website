<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<li><a><?php echo $name; ?></a></li>
						<li><a><?php
						$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
						$result = mysqli_query($con, $accountQuery);
						$row2=mysqli_fetch_row($result);
						echo $row2[0]; ?></a></li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
<?php endforeach; ?>
<?php if($parsed_ship_json!=NULL): ?>
	<?php foreach ($parsed_ship_json as $value): ?>
		<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<li><a><?php echo $shipName; ?></a></li>
						<li><a><?php
						$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
						$result = mysqli_query($con, $accountQuery);
						$row2=mysqli_fetch_row($result);
						echo $row2[0]; ?></a></li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
<?php if($parsed_fleet_json!=NULL): ?>
	<?php foreach ($parsed_fleet_json as $value): ?>
		<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<li><a><?php echo $fleetName; ?></a></li>
						<li><a><?php
						$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
						$result = mysqli_query($con, $accountQuery);
						$row2=mysqli_fetch_row($result);
						echo $row2[0]; ?></a></li>
					</ul>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>