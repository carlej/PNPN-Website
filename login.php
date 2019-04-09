<!DOCTYPE html>
<html>
	<head>
		<?php include("Connections/req.php"); ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Login</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>
		<?php 
		include 'Connections/convar.php'; 
	
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
			//$querysalt = "SELECT salt FROM Users WHERE username LIKE '$username'";
			//$salt = mysqli_query($con, $quirysalt);
//			$passwordhold = MD5($salt.$password);
			$quirypass = "SELECT Password FROM users WHERE Username LIKE '$Username'";
			$ackpass = mysqli_query($con, $quirypass);
			$row=mysqli_fetch_row($ackpass);
			if ($Password==$row[0]) {
				$msg = "Log in successfull";
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $Username;
				header("Location: /SDN-Website");
			}
			else{
				echo "error";
			}
//			if($ackpass==$passwordhold){
//				$msg = "Log in successfull";
//			}
//			else{
//				echo "ERROR: salt $salt password $passwordhold ackpass $ackpass. " . mysqli_error($conn);
//			}
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
        <input type="text" class="required" name="Password" id="Password">
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
