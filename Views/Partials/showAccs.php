<div class="container" id = "ShowAccounts">

	<div class = "AccountAccess">Account Access:</div>

	<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
					<ul>
						<tr>
							<div class ="row no-gutter">
								<div class = "col-sm-6" style="border-top-style: none">
									<li><a id="persHist" onmouseover="this.style.cursor='pointer'"><?php echo $name.':'; ?></a></li>
								</div>
								<div class = "col-sm-6 align-middle" style="border-top-style: none">
									<li><a><?php
									$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
									$result = mysqli_query($con, $accountQuery);
									$row2=mysqli_fetch_row($result);
									echo $row2[0]; ?></a></li>
								</div>
							</div>
						</tr>
					</ul>

		<?php endif; ?>
	<?php endforeach; ?>

<?php if($parsed_ship_json!=NULL): ?>
	<?php foreach ($parsed_ship_json as $value): ?>
		<?php if($value): ?>
					<ul>
						<tr>
							<div class ="row no-gutter">
								<div class = "col-sm-6" style="border-top-style: none">
									<li><a id="shipHist" onmouseover="this.style.cursor='pointer'"><?php echo $shipName.':'; ?></a></li>
								</div>
								<div class = "col-sm-6 align-middle" style="border-top-style: none">
									<li><a><?php
									$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
									$result = mysqli_query($con, $accountQuery);
									$row2=mysqli_fetch_row($result);
									echo $row2[0]; ?></a></li>
								</div>
							</div>
						</tr>
					</ul>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>

<?php if($parsed_fleet_json!=NULL): ?>
	<?php foreach ($parsed_fleet_json as $value): ?>
		<?php if($value): ?>
					<ul>
						<tr>
							<div class ="row no-gutter">
								<div class = "col-sm-6" style="border-top-style: none">
									<li><a onmouseover="this.style.cursor='pointer'"><?php echo $fleetName.':'; ?></a></li>
								</div>
								<div class = "col-sm-6 align-middle" style="border-top-style: none">
									<li><a><?php
									$accountQuery = "SELECT Ballance FROM accounts WHERE ID = '$value'";
									$result = mysqli_query($con, $accountQuery);
									$row2=mysqli_fetch_row($result);
									echo $row2[0]; ?></a></li>
								</div>
							</div>
						</tr>
					</ul>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
</div>




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
