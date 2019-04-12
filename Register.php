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
            echo "There is already a user with that user name";
            $msg = "<h2>Can't Add to Table</h2> There is already a user with that name $Username<p>";
        }
        else{
            do{
                srand(time());
                $id=rand(100000000,999999999);
                $queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
                $resultIn = mysqli_query($con, $queryIn);
                $row=mysqli_fetch_row($resultIn);
                if (mysqli_num_rows($resultIn)==0) {echo $id;
                    $a=false;
                    $accs="{\"id\": [";
                    $accs.=$id.", 0]}";
                    $insert = "INSERT INTO accounts (ID) VALUES ('$id')";
                    $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
                    $update = "UPDATE users SET Accounts = '$accs' WHERE users.Username = '$Username'";
                    //$inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
        }
        else
            $a=true;
    }while($a);
            $salt = md5(time());
            $passhold = md5($salt.$Password);
            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Email, Password, salt) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$email', '$passhold', '$salt')";
            if (mysqli_query($con,$query)) {
            $inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
                $msg = "Record added.<p>";
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $Username;
                header("Location: /SDN-Website");
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
