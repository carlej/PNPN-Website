<?php  
$url=NULL;  
    $url= $_SERVER['REQUEST_URI'];
  ?>
<div class="container-flow">
	<div class="header"></div>
	<div class="d-none d-lg-block">
	<div id="cssmenu" class="align-center">
     		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['perm'] == 'b'): ?>
     		<?php endif; ?>

				<div class="compRose"><img src="CSS\styles\Compass_Rose_2.png" alt="Compass_Rose"></div>
			<?php if ($url=="/teller.php"):?>
				<div class="bankButton"><a href="bank.php"><img alt="Bank" src="CSS/styles/Bank_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/bank.php"):?>
				<div class="bankButton"><a href="bank.php"><img alt="Bank" src="CSS/styles/Bank_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/headbanker.php"):?>
				<div class="bankButton"><a href="bank.php"><img alt="Bank" src="CSS/styles/Bank_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="bankButton"><a href="bank.php"><img alt="Bank" src="CSS/styles/Bank_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>


			<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
				<div class="logoutButton"><a href="logout.php"><img alt="log out" src="CSS/styles/Log_Out.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
			<?php endif; ?>


			<div class="tilda1"><img alt="~" src="CSS/styles/Scwig_1.png"></div>
			
			<?php if ($url=="/volunteercoord.php"):?>
				<div class="volunteerButton"><a href="volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/volunteer.php"):?>
				<div class="volunteerButton"><a href="volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/chartercoord.php"):?>
				<div class="volunteerButton"><a href="volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/charter.php"):?>
				<div class="volunteerButton"><a href="volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>	
			<?php else: ?>
				<div class="volunteerButton"><a href="volunteer.php"><img alt="Volunteering" src="CSS/styles/Volunteering_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>


			<div class="tilda2"><img alt="~" src="CSS/styles/Scwig_2.png"></div>
			

			<?php if ($url=="/landsteward.php"):?>
				<div class="landgrantButton"><a href="landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/landgrant.php"):?>
				<div class="landgrantButton"><a href="landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url=="/landvolunteer.php"):?>
				<div class="landgrantButton"><a href="landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="landgrantButton"><a href="landgrant.php"><img alt="landgrant" src="CSS/styles/Land_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>


			<?php if ($url=="/account.php"):?>
				<div class="accountButton"><a href="account.php"><img alt="account" src="CSS/styles/Account_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php elseif ($url!="/account.php"):?>
				<div class="accountButton"><a href="account.php"><img alt="account" src="CSS/styles/Account_Un.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php else: ?>
				<div class="accountButton"><a href="account.php"><img alt="account" src="CSS/styles/Account_Clicked.png" onmouseover="this.style.cursor='pointer'"></a></div>
			<?php endif;?>
		</ul>

	</div>
	</div>
	</div>

</div>

<!-- Code for the navigation bar once the page is shrunk-->
<div class="container-flow">
	<div class="header"></div>
	<div class="d-lg-none"> 
		<nav class="navbar" id="NavigationBar">
			
		<!-- Logout Button-->
			<div class ="col">
			<?php
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
				<a href="logout.php" onmouseover="this.style.cursor='pointer'"style = "font-family: pirates; color: white; text-decoration: none; font-size: 1.2em">Log Out</a>
			<?php else: ?>
				<li><a href="login.php">Login</a></li>
			<?php endif; ?>
			</div>

			
 		<!-- Toggler/collapsibe Button -->
	
 		<li>
 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
 				<div class = "icons">
    				<i class="fa fa-bars">
    				</i>
    			</div>
			</button>
		</li>



  		<!-- Navbar links -->
  		<div class="collapse navbar-collapse" id="collapsibleNavbar">
    		<ul class="nav navbar-nav justify-content-center">
      			<li class="nav-item">
        			<a class="nav-link" href="bank.php" style="font-family: pirates; color: white" >Bank</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="volunteer.php" style="font-family: pirates; color: white">Volunteering</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="landgrant.php" style="font-family: pirates; color: white">Land Grants</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="account.php" style="font-family: pirates; color: white">Account</a>
      			</li>
    		</ul>
  		</div>
		</nav> 
	</div>
</div>