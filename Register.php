<!doctype html>
<html>
	<head>
		<?php include("Connections/req.php"); ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Register</title>
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
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $pirateName = mysqli_real_escape_string($con, $_POST['pirateName']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $Password = mysqli_real_escape_string($con, $_POST['Password']);

        $queryIn = "SELECT * FROM users where Username='$Username' ";
        $resultIn = mysqli_query($con, $queryIn);
        if (mysqli_num_rows($resultIn)>0) {
            $msg = "<h2>Can't Add to Table</h2> There is already a user with that name $username<p>";
        }
        else{
            $salt = md5(time());
            $passhold = md5($salt.$Password);
            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Email, Password, salt) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$email', '$passhold', '$salt')";
            if (mysqli_query($con,$query)) {
                $msg = "Record added.<p>";
                echo "Thank you for makeing an account please log in now";
            }
            else
                echo "ERROR";//.mysql_error($con);
        }
    }
    mysqli_close($con);
    ?>
		<form method="post" id="addForm">											
<fieldset>
	<legend>User Info:</legend>
    <p>
        <label for="Username">Username:</label>
		<input type="text" class="required" name="Username" id="Username">    
    </p>
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" class="required" name="firstName" id="firstName">
    </p>
	<p>
        <label for="lastName">Last Name:</label>
        <input type="text" class="required" name="lastName" id="lastName">
    </p>
    <p>
        <label for="pirateName">Pirate Name:</label>
        <input type="text" class="required" name="pirateName" id="pirateName">
    </p>
    <p>
        <label for="email">E-Mail:</label>
        <input type="text" class="required" name="email" id="email">
	</p>
	<p>
        <label for="Password">Password:</label>
        <input type="text" class="required" name="Password" id="Password">
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" />
        <input type = "reset"  value = "Clear Form" />
      </p>
</form>
	</body>

</html>
