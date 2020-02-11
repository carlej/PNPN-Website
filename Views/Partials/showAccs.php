
<table class="AccDiss">
<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<tr>
							<td><li><a id="persHist" onmouseover="this.style.cursor='pointer'"><?php echo $name.':'; ?></a></li></td>
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
							<td><li><a id="shipHist" onmouseover="this.style.cursor='pointer'"><?php echo $shipName.':'; ?></a></li></td>
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
							<td><li><a onmouseover="this.style.cursor='pointer'"><?php echo $fleetName.':'; ?></a></li></td>
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
        document.getElementById("persHist").onclick = function() { 
  
            document.getElementById("persHistShow").style.display = "block";
            document.getElementById("shipHistShow").style.display = "none";
            document.getElementById("fleetHistShow").style.display = "none"; 
  
        } 
  
        document.getElementById("shipHist").onclick = function() { 
  
            document.getElementById("persHistShow").style.display = "none";
            document.getElementById("shipHistShow").style.display = "block";
            document.getElementById("fleetHistShow").style.display = "none";  
  
        } 
  
        document.getElementById("fleetHist").onclick = function() { 
  
            document.getElementById("persHistShow").style.display = "none";
            document.getElementById("shipHistShow").style.display = "none";
            document.getElementById("fleetHistShow").style.display = "block";  
  
        } 
    </script> 