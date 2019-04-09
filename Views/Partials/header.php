<div class="container">
	<div class="header"></div>
	<div id="cssmenu" class="align-center">
 		<ul>
     		<li><a href="/SDN-Website">Home</a></li>
			<li><a href="/SDN-Website/bank.php">Bank of the SDN</a></li>
			<li><a href="/SDN-Website/landgrant.php">Land Grants</a></li>
			<li><a href="/SDN-Website/volunteer.php">Volunteering</a></li>
			<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
				<li><a href="/SDN-Website/logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="/SDN-Website/login.php">Login</a></li>
			<?php endif; ?>
		</ul>
	</div>
</div>