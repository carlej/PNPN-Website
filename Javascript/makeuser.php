<?php //This file creates a new user


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
            //This is where i take the colleted data and input it into the db I have been told to remove usernames from this and use it only from email but that has not been done yet
        $Username = mysqli_real_escape_string($con, $_POST['Username']);
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $pirateName = mysqli_real_escape_string($con, $_POST['pirateName']);
        $shipName = mysqli_real_escape_string($con, $_POST['shipName']);
        $fleetName = mysqli_real_escape_string($con, $_POST['fleetName']);
        $Password = mysqli_real_escape_string($con, $_POST['password']);
        $queryIn = "SELECT * FROM users where Username='$Username' ";
        $resultIn = mysqli_query($con, $queryIn);
        if (mysqli_num_rows($resultIn)>0) {
 //           echo "There is already a user with that email!";
           echo '<script type="text/javascript">alert("There is already a user with that email!");
		   		window.location = "/PNPN-Website/register.php"
		   </script>';
            $msg = "<h2>Can't Add to Table</h2> There is already a user with that email! $Username<p>";
			
        }
        else{
            do{
                srand(time()); //this creates their account so that they have an account at creation this loops so make sure that if it makes a account number that already exists that it will make a new one and see if it exists
                $id=rand(100000000,999999999);
                $queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
                $resultIn = mysqli_query($con, $queryIn);
                $row=mysqli_fetch_row($resultIn);
                if (mysqli_num_rows($resultIn)==0) {//echo $id;
                    $a=false;
                    $accs="{\"id\": [";
                    $accs.=$id.", 0]}";
                    $insert = "INSERT INTO accounts (ID) VALUES ('$id')";
                    $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
                    $Updates = "UPDATE users SET Accounts = '$accs' WHERE users.Username = '$Username'";
                    //$inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
        }
        else
            $a=true;
    }while($a); //adds the data to the db
            $salt = md5(time());
            $passhold = md5($salt.$Password);
            if ($shipName!=NULL && $fleetName!=NULL){
                $queryShip = "SELECT * FROM ship WHERE Name LIKE '%$shipName%'";
                $resultShip= mysqli_query($con,$queryShip);
                $rowShip=mysqli_fetch_row($resultShip);
                $sName = $rowShip[0];
                $queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$fleetName%'";
                $resultFleet= mysqli_query($con,$queryFleet);
                $rowFleet=mysqli_fetch_row($resultFleet);
                $fName = $rowFleet[0];
                $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, shipC, fleetC) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', $sName, $fName)";
            }
            else if ($shipName!=NULL) {
                $queryShip = "SELECT * FROM ship WHERE Name LIKE '%$shipName%'";
                $resultShip= mysqli_query($con,$queryShip);
                $rowShip=mysqli_fetch_row($resultShip);
                $sName = $rowShip[0];
                $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, shipC) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', $sName)";
            }
            else if ($fleetName!=NULL) {
                $queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$fleetName%'";
                $resultFleet= mysqli_query($con,$queryFleet);
                $rowFleet=mysqli_fetch_row($resultFleet);
                $fName = $rowFleet[0];
                $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, fleetC) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', $fName)";
            }
            else{
                $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt')";
            }
            
            if (mysqli_query($con,$query)) {
            $inup= mysqli_query($con, $update); //Updates the users DB section to show ownership of the new account.
                $msg = "Record added.<p>";
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
                header("Location: /PNPN-Website/bank.php");
            }
            else
                //echo $shipName;
                echo $queryShip;
                //echo "ERROR";//.mysql_error($con);
        }
    }
    mysqli_close($con);
    ?>