<?php  
$url=NULL;  
    $url.= $_SERVER['REQUEST_URI'];
  ?>
  <div class="container">
	<div class="header"></div>
	<div id="cssmenu" class="align-center">
     		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm'] == 'b'): ?>
     		<?php endif; ?>
     		<div class="TopStripe"><img alt="~" src="CSS/styles/Top_Line.jpg"></div>
     		<div class="SideStripe"><img alt="~" src="CSS/styles/Side_Line.jpg"></div>
			<div class="compRose"><img src="CSS\styles\Compass_Rose_2.png" alt="Compass_Rose"></div>


			<?php if ($url=="/PNPN-Website/teller.php"):?>
				<div class="bankButton"><a href="/PNPN-Website/bank.php"><img alt="Bank" src="CSS/styles/Bank_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url!="/PNPN-Website/bank.php"):?>
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
			

			<?php if ($url=="/PNPN-Website/volunteercord.php"):?>
				<div class="volunteerButton"><a href="/PNPN-Website/volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url!="/PNPN-Website/volunteer.php"):?>
				<div class="volunteerButton"><a href="/PNPN-Website/volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>	
			<?php else: ?>
				<div class="volunteerButton"><a href="/PNPN-Website/volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>


			<div class="tilda2"><img alt="~" src="CSS/styles/Scwig_2.png"></div>
			

			<?php if ($url=="/PNPN-Website/landsteward.php"):?>
				<div class="landgrantButton"><a href="/PNPN-Website/landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url!="/PNPN-Website/landgrant.php"):?>
				<div class="landgrantButton"><a href="/PNPN-Website/landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="landgrantButton"><a href="/PNPN-Website/landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>
			<?php //<div class="full"><img alt="~" src="CSS/styles/Full.png"></div> ?>
		</ul>
	</div>
</div>
