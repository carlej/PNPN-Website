<div class="container">
	<div class="header"></div>
	<div id="cssmenu" class="align-center">
 		<ul>
     		<li><a href="/PNPN-Website">Home</a></li>
     		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm'] == 'b'): ?>
     			<li><a href="/PNPN-Website/teller.php">Teller</a></li>
     		<?php endif; ?>
			<li><a href="/PNPN-Website/bank.php">Bank of the PNPN</a></li>
			<li><a href="/PNPN-Website/landgrant.php">Land Grants</a></li>
			<li><a href="/PNPN-Website/volunteer.php">Volunteering</a></li>
			<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
				<li><a href="/PNPN-Website/logout.php">Logout</a></li>
			<?php else: ?>
				<li><a href="/PNPN-Website/login.php">Login</a></li>
			<?php endif; ?>
			<div class="compRose"><img src="CSS\styles\Compass_Rose.png" alt="Compass_Rose"></div>
		</ul>
	</div>
</div>