<?php 

        include 'Connections/convar.php'; 
        include("Connections/req.php");
    
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
//            echo "There is already a user with that user name";
 //           echo '<script type="text/javascript">alert("There is already a user with that user name please enter again");</script>';
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
                $_SESSION['perm'] = $perm[0];
                header("Location: /SDN-Website");
            }
            else
                echo "ERROR";//.mysql_error($con);
        }
    }
    mysqli_close($con);
    ?>