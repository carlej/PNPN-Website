<!DOCTYPE html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Login</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>
		<?php 
		include 'Javascript/Connections/convar.php'; 
	
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
		$Username = mysqli_real_escape_string($con, $_POST['Username']);
		$Password = mysqli_real_escape_string($con, $_POST['Password']);

		$queryIn = "SELECT * FROM users where Username='$Username' ";
		$resultIn = mysqli_query($con, $queryIn);
		if (mysqli_num_rows($resultIn)!=0) {
			$quirypass = "SELECT Password FROM users WHERE Username LIKE '$Username'";
			$ackpass = mysqli_query($con, $quirypass);
			$row=mysqli_fetch_row($ackpass);
			$querysalt = "SELECT salt FROM Users WHERE username LIKE '$Username'";
			$acksalt = mysqli_query($con, $querysalt);
			$salt = mysqli_fetch_row($acksalt);
			$passwordhold = MD5($salt[0].$Password);
			$queryperm = "SELECT `Account Permissions` FROM Users WHERE username LIKE '$Username'";
			$ackperm = mysqli_query($con, $queryperm);
			$perm = mysqli_fetch_row($ackperm);
			if ($row[0]==$passwordhold) {
				$msg = "Log in successfull";
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $Username;
				$_SESSION['perm'] = $perm[0];
				$_SESSION['hold']="hold";
				echo $perm[0];
				header("Location: /SDN-Website");
			}
			else{
				echo "error";
			}
		}
	}
	mysqli_close($con);
	?>
		<form method="post" id="addForm">											
<fieldset>
	<legend>User Info:</legend>
    <p>
        <label for="Username">Username:</label>
		<input type="text" class="required" name="Username" id="Username">    </p>
    <p>
	<p>
        <label for="Password">Password:</label>
        <input type="password" class="required" name="Password" id="Password">
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear" />
      </p>
</form>
		<div id="buttons" class="align-center">
 			<ul>
     			<li><a href="/SDN-Website/register.php">Register</a></li>
			</ul>
		</div>
	</body>

</html>
