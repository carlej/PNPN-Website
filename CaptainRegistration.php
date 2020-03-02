<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
        include 'Javascript/Connections/convar.php';
        $con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
        if (!$con) {
        	echo "here";
            die('Could not connect: ' . mysql_error());
        } ?>

		<title>Captain's Registration</title>
	</head>
	<body class = "RegistrationPage">
<div class ="container">
    <div class = "d-flex justify-content-center" id = "RegisterWindow" >
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"):
            $Username = mysqli_real_escape_string($con, $_POST['Username']);
            $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
            $pirateName = mysqli_real_escape_string($con, $_POST['pirateName']);
            $shipName = mysqli_real_escape_string($con, $_POST['shipName']);
            $fleetName = mysqli_real_escape_string($con, $_POST['fleetName']);
            $Password = mysqli_real_escape_string($con, $_POST['password']);
            $queryIn = "SELECT * FROM users where Username='$Username' ";
            $resultIn = mysqli_query($con, $queryIn);
            if (mysqli_num_rows($resultIn)>0) { ?>
                <form method="post"  name="Register" id="addForm" >
                <fieldset>
                    <legend style="font-family: pirates; font-size: 1.6em; margin-bottom: 1em;">Captain/Head of House Registration:</legend>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 0.1em"> READ ME:</p>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 1em"> This registration form is specifically for the Captains and Heads of Households. Only one may sign-up under this registration form. If you have a council of members instead of a single head please choose one person to fill out this form. The purpose of this separate registration form is to create ship/household and fleet/alliance accounts. Once you have completed this form, the rest of your ship/household may signup under the normal registration form. 
                    </p>
                    <p>
                        <label for="Username" style="font-family: pirates">Email:</label>
                        <input type="email"  name="Username" id="Username" style="width: 12em;" required> 
                        <div class="container" id = "NoneFound" style="margin-top: 0em">There is already a user with that Email!</div>    
                    </p>
                    <p>
                        <label for="firstName" style="font-family: pirates">First Name:</label>
                        <input type="text" name="firstName" id="firstName" style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="lastName" style="font-family: pirates">Last Name:</label>
                        <input type="text" name="lastName" id="lastName" style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="pirateName" style="font-family: pirates">Pirate Name:</label>
                        <input type="text" name="pirateName" id="pirateName" style="width: 12em;">
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT a Captain or Head of House DO NOT input a Ship/Household Name!! </p>
                    <p>
                        <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                        <input type="text" name="shipName" id="shipName" style="width: 12em;">
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT the leader of a Fleet or Alliance DO NOT input a Fleet/Alliance Name!! </p>
                    <p>
                        <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                        <input type="text" name="fleetName" id="fleetName" style="width: 12em;">
                    </p>
                    <p>
                        <label for="Password" style="font-family: pirates;">Password:</label>
                        <input id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                    </p>

                    <p>
                        <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
                        <input id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
                    </p>
                    <p>
                    <input type = "submit"  value = "Submit" style="font-family: pirates"/>
                    <input type = "reset"  value = "Clear Form" style="font-family: pirates" />
                    </p>
                    <div id="buttons" class="align-center" style="font-family: pirates">
                    </div>
                </fieldset>
            </form><?php
            }
            else{
                if ($shipName!=NULL) {
                    srand(time());
                    $shipid=rand(1000,9999);
                    $queryIn = "SELECT ID FROM ship WHERE ID = '$shipid'";
                    $resultIn = mysqli_query($con, $queryIn);
                    //chances are that it will not need to make more then one ID for the ship but i still have it check and loop just in case.
                    do{
                    if (mysqli_num_rows($resultIn)==0) {
                        //echo $shipid;
                        $b=false;
                        $a = true;
                        $query = "INSERT INTO ship (ID, Name, Captain) VALUES ('$shipid', '$shipName', '$Username')";
                        do{ //this loop is the same as in make users to make an accoutn for the new ship/house
                            srand(time());
                            $shipid=rand(1000,9999);
                            $queryIn = "SELECT ID FROM ship WHERE ID = '$shipid'";
                            $resultIn = mysqli_query($con, $queryIn);
                            //$row=mysqli_fetch_row($resultIn);
                            //echo $queryIn;
                            if (mysqli_num_rows($resultIn)==0) {
                                //echo $id;
                                $a=false;
                                $accs="{\"id\": [";
                                $accs.=$id.", 0]}";
                                $insert = "INSERT INTO accounts (ID) VALUES ('$id')";
                                $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
                                $insertship = mysqli_query($con, $query);
                                $updateacc = "UPDATE ship SET Accounts = '$accs' WHERE ship.ID = '$shipid'";
                                $updateuse="UPDATE users SET ship = '$shipid', shipC = '$shipid' WHERE users.username='$Username'";
                                $inup= mysqli_query($con, $updateacc); //Updates the users DB section to show ownership of the new account.
                            }
                            else
                                echo "ERROR 112";//.mysql_error($con);
                        }while($a);
                    }
                    else{
                        $b=true;
                        $shipid=rand(1000,9999);
                        $queryIn = "SELECT ID FROM ship WHERE ID = '$shipid'";
                        $resultIn = mysqli_query($con, $queryIn);
                        $row=mysqli_fetch_row($resultIn);
                    }
                    }while($b);
                }
                if ($fleetName!=NULL) {
                    srand(time());
                    $b=true;
                    $a=true;
                    $fleetid=rand(1000,9999);
                    $queryIn = "SELECT ID FROM fleet WHERE ID = '$fleetid'";
                    $resultIn = mysqli_query($con, $queryIn);
                    $row=mysqli_fetch_row($resultIn);
                    //chances are that it will not need to make more then one ID for the fleet but i still have it check and loop just in case.
                    do{
                    if (mysqli_num_rows($resultIn)==0) {
                        //echo $fleetid;
                        $b=false;
                        $query = "INSERT INTO fleet (ID, Name, Admiral) VALUES ('$fleetid', '$fleetName', '$Username')";
                        do{ //this loop is the same as in make users to make an accoutn for the new fleet/house
                            srand(time());
                            $idfleet=rand(100000000,999999999);
                            $queryInfleetacc = "SELECT ID FROM accounts WHERE ID = '$idfleet'";
                            $resultInfleetacc = mysqli_query($con, $queryInfleetacc);
                            //echo $queryIn;
                            if (mysqli_num_rows($resultInfleetacc)==0) {
                                //echo $id;
                                $a=false;
                                echo "here";
                                $accs="{\"id\": [";
                                $accs.=$idfleet.", 0]}";
                                $insert = "INSERT INTO accounts (ID) VALUES ('$idfleet')";
                                $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
                                $insertfleet = mysqli_query($con, $query);
                                $updateacc = "UPDATE fleet SET Accounts = '$accs' WHERE fleet.ID = '$fleetid'";
                                $updateuse="UPDATE users SET fleet = '$fleetid' WHERE users.Username='$Username'";
                                $inup= mysqli_query($con, $updateacc); //Updates the users DB section to show ownerfleet of the new account.
                                
                                ?><script type="text/javascript">window.location.href='/PNPN-Website/bank.php'</script><?php
                            }
                            else
                                echo mysqli_num_rows($resultInfleetacc);//.mysql_error($con);
                        }while($a);
                    }
                    else{
                        $b=true;
                        $fleetid=rand(1000,9999);
                        $queryIn = "SELECT ID FROM fleet WHERE ID = '$fleetid'";
                        $resultIn = mysqli_query($con, $queryIn);
                        $row=mysqli_fetch_row($resultIn);
                    }
                    }while($b);
                }
                if ($fleetName!=NULL && $shipName!=NULL) {
                    $updateuse="UPDATE users SET Fleet = '$fleetid', Ship = '$shipid', shipC = '$shipid', fleetC = '$fleetid' WHERE users.Username='$Username'";
                }
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
                        $update = "UPDATE users SET Accounts = '$accs' WHERE users.Username = '$Username'";
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
                        $upuser=mysqli_query($con, $updateuse);
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
                        else{
                            //echo $shipName;
                            //echo $queryShip;
                            echo "ERROR 240";//.mysql_error($con);
                        }
                    
                }
                mysqli_close($con);
            
         ?>
        <?php else: ?>
    		<form method="post"  name="Register" id="addForm" >
                <fieldset>
                	<legend style="font-family: pirates; font-size: 1.6em; margin-bottom: 1em;">Captain/Head of House Registration:</legend>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 0.1em"> READ ME:</p>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 1em"> This registration form is specifically for the Captains and Heads of Households. Only one may sign-up under this registration form. If you have a council of members instead of a single head please choose one person to fill out this form. The purpose of this separate registration form is to create ship/household and fleet/alliance accounts. Once you have completed this form, the rest of your ship/household may signup under the normal registration form. 
                    </p>
                    <p>
                        <label for="Username" style="font-family: pirates">Email:</label>
                		<input type="email"  name="Username" id="Username" style="width: 12em;" required>    
                    </p>
                    <p>
                        <label for="firstName" style="font-family: pirates">First Name:</label>
                        <input type="text" name="firstName" id="firstName" style="width: 12em;" required>
                    </p>
                	<p>
                        <label for="lastName" style="font-family: pirates">Last Name:</label>
                        <input type="text" name="lastName" id="lastName" style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="pirateName" style="font-family: pirates">Pirate Name:</label>
                        <input type="text" name="pirateName" id="pirateName" style="width: 12em;">
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT a Captain or Head of House DO NOT input a Ship/Household Name!! </p>
                    <p>
                        <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                        <input type="text" name="shipName" id="shipName" style="width: 12em;">
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT the leader of a Fleet or Alliance DO NOT input a Fleet/Alliance Name!! </p>
                    <p>
                        <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                        <input type="text" name="fleetName" id="fleetName" style="width: 12em;">
                    </p>
                	<p>
                        <label for="Password" style="font-family: pirates;">Password:</label>
                        <input id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                    </p>
                    <p>
                        <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
                        <input id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
                    </p>

                            <p>
                            <input type = "submit"  value = "Submit" style="font-family: pirates"/>
                            <input type = "reset"  value = "Clear Form" style="font-family: pirates" />
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            </div>
                        </fieldset>
                    </form>
                <?php endif; ?>
            </div>
        </div>
	</body>

</html>
<script type="text/javascript">
    function valadate(){
        var Username = document.forms["Register"]["Username"].value;
        var re=false;
        $.ajax({
            async: false,
            type: "POST",
            url: 'http://Javascript/valuse.php',
            data:{Username},
            dataType: 'JSON',
            success: function(output){
                if(output[1])
                    alert(output[1]);
                re=output[0];
            }
        });return re;
    }
</script>