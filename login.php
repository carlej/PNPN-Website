<?php //this is the log in file?>

<!DOCTYPE html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<title>Login</title>
	</head>
	<body class = "LoginPage">
		
		<div class ="container">
			<div class = "d-flex justify-content-center">
				<div style="font-family: pirates; font-size: 1.5em"; id = "WelcomeMessage">Welcome</div>
			</div>
		</div>
			
			
		<?php 
		include 'Javascript/Connections/convar.php'; 
		
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
		$Username = $_POST['Username'];
		$Password = mysqli_real_escape_string($con, $_POST['Password']);

		$queryIn = "SELECT * FROM users where Username='$Username' ";
		$resultIn = mysqli_query($con, $queryIn);
		if (mysqli_num_rows($resultIn)==0){
			echo '<div class="container" id = "NoneFound">
							There are no accounts with that Email!
					</div>';
			//echo '<script type="text/javascript">alert("That email does not exist.");</script>';
            //$msg = "<h2>Can't Add to Table</h2> That email does not exist. $Username<p>";
		}
		if (mysqli_num_rows($resultIn)!=0) {
			$row2 = mysqli_fetch_row($resultIn);
			$ackpass = $row2[1];
			$salt = $row2[2];
			$passwordhold = md5($salt.$Password);
			$queryperm = "SELECT `AccountPerm` FROM Users WHERE username LIKE '$Username'";
			$ackperm = mysqli_query($con, $queryperm);
			$perm = mysqli_fetch_row($ackperm);

			if ($ackpass==$passwordhold) {
				$msg = "Log in successfull";
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $Username;
				$_SESSION['perm'] = $perm[0];
				$_SESSION['hold']="hold";
				$_SESSION['temp']="temp";
				$_SESSION['multsearch']=array('1');
				$_SESSION['stype']=NULL;
				$_SESSION['nest']="hold";
				$_SESSION['nstype']=NULL;
				$_SESSION['clear']='NULL';
				echo $perm[0];
				header("Location: bank.php");
			}
			else{
				//echo $Username;
				//echo $Password;
				echo '<div class="container-flow" id="LoginE">
						<div class = "d-flex justify-content-center">
						<div class = "row" >
						<div class = "col-12">Incorrect Login</div>
						</div>
						</div>
					 </div>';
			}
		}
	}
	mysqli_close($con);
	?>

	<div class ="container">
		<div class = "d-flex justify-content-center" id = "LoginWindow" >
			<div class = "row">
			<div class = "col-12">
			<form method="post" id="addForm">
    			<p>
        			<label for="Username" style="font-family: pirates">Email:</label>
					<input type="text" class="required" name="Username" id="Username" style="width: 15em;">
				</p>
				<p>
        			<label for="Password" style="font-family: pirates">Password:</label>
        			<input type="password" class="required" name="Password" id="Password" style="width: 13.6em;">
    			</p>
				<p>
        			<input type = "submit"  value = "Submit" style="font-family: pirates"/>
        			<input type = "reset"  value = "Clear" style="font-family: pirates" />
    			</p>
				<div id="buttons" class="align-center" style="font-family: pirates">
     				<a href="register.php" style="color:black; text-decoration: none;">Don't have an account? Sign Up Here!</a>
     			</div>
     			<div id="buttons" class="align-center" style="font-family: pirates">
     				<a href="passRecov.php" style="color:black; text-decoration: none;">Forgot Password!</a>
     			</div>
			</form>
			</div>
			</div>
		</div>
	</div>
	
	</body>
</html>
