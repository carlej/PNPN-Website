<?php
	include("Javascript/Connections/reqMain.php");
?>	
<div class="container-flow">
	<div class="header"></div>
		<div class="d-none d-xl-block">
		<nav class="navbar navbar-expand-lg" id="NavBar">
			<div class="container-fluid">
				<a class="navbar-brand" id="NavBarName">Pacific Northwest Pirate Nation</a>
				<ul class="navbar-nav" id="NavBarLinks">
					<li class="nav-item">
	  					<a class="nav-link" href="index.php">Home</a>
					</li>

					<li class="nav-item dropdown">
	     		 		<a class="nav-link" id="navbardrop" data-toggle="dropdown" role = "button">
	     		 			Events
	      				</a>
					    <div class="dropdown-menu">
					        <a class="dropdown-item" href="PortNassau.php">Port Nassau</a>
					        <a class="dropdown-item" href="TortugaNights.php">Tortuga Nights</a>
					    </div>
	    			</li>

					<li class="nav-item dropdown">
	     		 		<a class="nav-link" id="navbardrop" data-toggle="dropdown">
	     		 			Community
	      				</a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item" href="NewToPirating.php">New to Pirating?</a>
					    	<a class="dropdown-item" href="Etiquette.php">Etiquette</a>
					        <a class="dropdown-item" href="Immersion101.php">Immersion 101</a>
					    </div>
	    			</li>

	    			<li class="nav-item dropdown">
	     		 		<a class="nav-link" id="navbardrop" data-toggle="dropdown">
	     		 			Command Center
	      				</a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item" href="WhosLegacyBay.php">Who's P.N.P.N.?</a>
					        <a class="dropdown-item" href="PortNassauStaff.php">Port Nassau Staff</a>
					        <a class="dropdown-item" href="PortNassauStaff.php">Tortuga Staff</a>
					        <a class="dropdown-item" href="FAQ.php">F.A.Q.</a>
					        <a class="dropdown-item" href="Policies.php">Policies</a>
					    </div>
	    			</li>

	    			<li class="nav-item dropdown">
	     		 		<a class="nav-link" id="navbardrop" data-toggle="dropdown">
	     		 			Get Involved
	      				</a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item" href="Volunteer.php">Volunteer</a>
					        <a class="dropdown-item" href="Merchanting.php">Merchanting</a>
					        <a class="dropdown-item" href="Staff.php">Staff</a>
					    </div>
	    			</li>
	    			<li class="nav-item">
	  					<a class="nav-link" href="index.php">Triple Key</a>
					</li>
	    		</ul>
	    	</div>
		</nav>
	</div>
</div>

<!-- Code for the navigation bar once the page is shrunk-->
<div class="container-flow">
	<div class="header"></div>
	<div class="d-xl-none"> 
		<nav class="navbar" id="NavigationBar">
			<div class ="navbar-header" style="font-family:Pirates; font-size: 1.6em; color: white">
				Pacific Northwest Pirate Nation
			</div>

 		<!-- Toggler/collapsibe Button -->
	 		<div>
	 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	 				<div class = "icons">
	    				<i class="fa fa-bars"></i>
	    			</div>
				</button>
			</div>

	  		<!-- Navbar links -->
	  		<div class="collapse navbar-collapse" id="collapsibleNavbar">
	    		<ul class="nav navbar-nav">
	      			<li class="nav-item active" id="nav-link2">
	        			<a class="nav-link" href="index.php">Home</a>
	      			</li>
	      			<li class="nav-item dropdown" id="nav-link2">
	        			<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Events</a>
	        			<div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
	        				<a class="dropdown-item" href="PortNassau.php">Port Nassau</a>
	        				<a class="dropdown-item" href="TortugaNights.php">Tortuga Nights</a>
	        			</div>
	      			</li>
	      			<li class="nav-item dropdown" id="nav-link2">
	        			<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Community</a>
	        			<div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
	        				<a class="dropdown-item" href="NewToPirating.php">New to Pirating?</a>
	        				<a class="dropdown-item" href="Etiquette.php">Etiquette</a>
	        				<a class="dropdown-item" href="Immersion101.php">Immersion 101</a>
	        			</div>
	      			</li>
	      			<li class="nav-item dropdown" id="nav-link2">
	        			<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Command Center</a>
	        			<div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
	        				<a class="dropdown-item" href="WhosLegacyBay.php">Who's P.N.P.N.?</a>
	        				<a class="dropdown-item" href="PortNassauStaff.php">Port Nassau Staff</a>
	        				<a class="dropdown-item" href="PortNassauStaff.php">Tortuga Staff</a>
	        				<a class="dropdown-item" href="FAQ.php">F.A.Q.</a>
	        				<a class="dropdown-item" href="Policies.php">Policies</a>
	        			</div>
	      			</li>
	      			</li>
	      			<li class="nav-item dropdown" id="nav-link2">
	        			<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">Get Involved</a>
	        			<div class="dropdown-menu" aria-labelledby="collapsibleNavbar">
	        				<a class="dropdown-item" href="Volunteer.php">Volunteer</a>
	        				<a class="dropdown-item" href="Merchanting.php">Merchanting</a>
	        				<a class="dropdown-item" href="Staff.php">Staff</a>
	        			</div>
	      			</li>
	      			<li class="nav-item active" id="nav-link2">
	        			<a class="nav-link" href="index.php">Triple Key</a>
	      			</li>
	    		</ul>
	  		</div>
		</nav> 
	</div>
</div>

