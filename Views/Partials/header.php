<?php  
$url=NULL;  
    $url.= $_SERVER['REQUEST_URI'];
  ?>
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
			
			<div class="compRose"><img src="CSS\styles\Compass_Rose.png" alt="Compass_Rose"></div>
			<?php if ($url!="/PNPN-Website/bank.php"):?>
				<div class="bankButton"><a href="/PNPN-Website/bank.php"><img alt="Bank" src="CSS/styles/Bank_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="bankButton"><a href="/PNPN-Website/bank.php"><img alt="Bank" src="CSS/styles/Bank_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>
			<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
				<div class="logoutButton"><a href="/PNPN-Website/logout.php"><img alt="log outk" src="CSS/styles/Log_Out.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<li><a href="/PNPN-Website/login.php">Login</a></li>
			<?php endif; ?>
			<div class="tilda1"><img alt="~" src="CSS/styles/Scwig_1.png"></div>
			<?php if ($url!="/PNPN-Website/volunteer.php"):?>
				<div class="volunteerButton"><a href="/PNPN-Website/volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="volunteerButton"><a href="/PNPN-Website/volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>
			<div class="full"><img alt="~" src="CSS/styles/Full.png"></div>
		</ul>
	</div>
</div>
