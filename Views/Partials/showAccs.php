
<table class="AccDiss">
<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<tr>
							<td><li><a onclick="showhist('showhist.php')" onmouseover="this.style.cursor='pointer'"><?php echo $name.':'; ?></a></li></td>
							<td>
								<li><a><?php
								$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
								$result = mysqli_query($con, $accountQuery);
								$row2=mysqli_fetch_row($result);
								echo $row2[0]; ?></a></li>
							<td>
						</tr>
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
						<tr>
							<td><li><a onclick="showhist('showhist.php')" onmouseover="this.style.cursor='pointer'"><?php echo $shipName.':'; ?></a></li></td>
							<td>
								<li><a><?php
								$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
								$result = mysqli_query($con, $accountQuery);
								$row2=mysqli_fetch_row($result);
								echo $row2[0]; ?></a></li>
							</td>
						</tr>
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
						<tr>
							<td><li><a onclick="showhist('showhist.php')" onmouseover="this.style.cursor='pointer'"><?php echo $fleetName.':'; ?></a></li></td>
							<td>
								<li><a><?php
								$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
								$result = mysqli_query($con, $accountQuery);
								$row2=mysqli_fetch_row($result);
								echo $row2[0]; ?></a></li>
							</td>
						</tr>
					</ul>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
</table>

<script type="text/javascript">
	var parsed_json=<?php echo json_encode($parsed_json); ?>;
	var parsed_ship_json=<?php echo json_encode($parsed_ship_json); ?>;
	var parsed_fleet_json=<?php echo json_encode($parsed_fleet_json); ?>;
    function showhist(catnam){
    		$("#hist").load("/showhist.php",$parsed_json,$parsed_ship_json,$parsed_fleet_json);
    }
</script>