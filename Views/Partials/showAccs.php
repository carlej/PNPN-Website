<?php foreach ($parsed_json as $value): ?>
			<?php if($value): ?>
			<div class="container">
				<div id="cssmenu" class="align-center">
					<ul>
						<li><a><?php echo $value; ?></a></li>
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