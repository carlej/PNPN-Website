<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
        include 'Javascript/Connections/convar.php';
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$con) {
        	echo "here";
            die('Could not connect: ' . mysql_error());
        } ?>

		<title>Register</title>
	</head>
	<body class = "RegistrationPage">

<div class ="container">
    <div class = "d-flex justify-content-center" id = "RegisterWindow" >
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"):
            $Username = mysqli_real_escape_string($con, $_POST['Username']);
            $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
            $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
            $Pname = mysqli_real_escape_string($con, $_POST['pirateName']);
            $pirateName = str_replace(' ', '&nbsp;', $Pname);
            $shipName = mysqli_real_escape_string($con, $_POST['shipName']);
            $fleetName = mysqli_real_escape_string($con, $_POST['fleetName']);
            $Password = mysqli_real_escape_string($con, $_POST['password']);
            $confPass = mysqli_real_escape_string($con, $_POST['password_two']);
            $question = mysqli_real_escape_string($con, $_POST['question']);
            $answerUnhash = mysqli_real_escape_string($con, $_POST['answer']);
            $queryIn = "SELECT * FROM users where Username='$Username' ";
            $resultIn = mysqli_query($con, $queryIn);
            if (mysqli_num_rows($resultIn)>0 || ($Password != $confPass)) { ?>
                <form method="post"  name="Register" id="addForm" >
                <fieldset>
                    <legend style="font-family: pirates; font-size: 1.6em; margin-bottom: 1em;">Captain/Head of House Registration:</legend>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 0.1em"> READ ME:</p>
                    <p style="font-family: pirates; font-size: 1.2em; margin-bottom: 1em"> This registration form is specifically for the Captains and Heads of Households. Only one may sign-up under this registration form. If you have a council of members instead of a single head please choose one person to fill out this form. The purpose of this separate registration form is to create ship/household and fleet/alliance accounts. Once you have completed this form, the rest of your ship/household may signup under the normal registration form. 
                    </p>
                    <p>
                        <label for="Username" style="font-family: pirates">Email:</label>
                        <input type="email"  name="Username" id="Username" value='<?php echo $Username;?>' style="width: 12em;" required> 
                        <?php if (mysqli_num_rows($resultIn)>0): ?>
                            <div class="container" id = "NoneFound" style="margin-top: 0em">There is already a user with that Email!</div> 
                        <?php endif; ?>   
                    </p>
                    <p>
                        <label for="firstName" style="font-family: pirates">First Name:</label>
                        <input type="text" name="firstName" id="firstName" value='<?php echo $firstName;?>' style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="lastName" style="font-family: pirates">Last Name:</label>
                        <input type="text" name="lastName" id="lastName" value='<?php echo $lastName;?>' style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="pirateName" style="font-family: pirates">Pirate Name:</label>
                        <?php if($pirateName!=NULL): ?>
                            <input type="text" name="pirateName" id="pirateName" minlength="3" value='<?php echo $pirateName;?>' style="width: 12em;">
                        <?php else: ?>
                            <input type="text" name="pirateName" id="pirateName" minlength="3" style="width: 12em;">
                        <?php endif; ?>
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT a Captain or Head of House DO NOT input a Ship/Household Name!! </p>
                    <p>
                        <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                        <?php if($shipName!=NULL): ?>
                            <input type="text" name="shipName" id="shipName" value='<?php echo $shipName;?>' style="width: 12em;">
                        <?php else: ?>
                            <input type="text" name="shipName" id="shipName" style="width: 12em;">
                        <?php endif; ?>
                    </p>
                    <p style="font-family: pirates; font-size: 1.2em;"> If you are NOT the leader of a Fleet or Alliance DO NOT input a Fleet/Alliance Name!! </p>
                    <p>
                        <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                        <?php if($fleetName!=NULL): ?>
                            <input type="text" name="fleetName" id="fleetName" value='<?php echo $fleetName;?>' style="width: 12em;">
                        <?php else: ?>
                            <input type="text" name="fleetName" id="fleetName" style="width: 12em;">
                        <?php endif; ?>
                    </p>
                    <p><label>Select Secutiry Question</label></p>
                    <p>
                        <select name="question" style="margin-left: 1em; margin-bottom: 0.5em">
                            <option value="0">What is the name of your first pet?</option>
                            <option value="1">What is the name of your favorite book?</option>
                            <option value="2">What is the name of your favorite teacher in school?</option>
                            <option value="3">Where was your first full time job?</option>
                            <option value="4">What is the name of your third-grade teacher?</option>
                            <option value="5">Where were you when you had your first alcoholic drink(or cigarette, joint etc.)?</option>
                        </select>
                    </p>
                    <p>
                        <label for="Answer" style="font-family: pirates">Answer:</label>
                        <input type="text" name="answer" id="answer" value='<?php echo $answer;?>' style="width: 12em;" required>
                    </p>
                    <p>
                        <label for="Password" style="font-family: pirates;">Password:</label>
                        <input id="password" name="password" type="password" minlength="6" required>
                    </p>

                    <p>
                        <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
                        <input id="password_two" name="password_two" type="password" minlength="6" required>
                        <?php if ($Password != $confPass): ?>
                            <div class="container" id = "NoneFound" style="margin-top: 0em">Please enter the same password as above!</div> 
                        <?php endif; ?> 
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
                            $id=rand(100000000,999999999);
                            $queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
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
                    $updateuse="UPDATE users SET Fleet = '$fleetid', Ship = '$shipid' WHERE users.Username='$Username'";
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
                        $answer = md5($salt.$answerUnhash);
                        if ($shipName!=NULL && $fleetName!=NULL){
                            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, shipC, fleetC, question, answer) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', '$shipid', '$fleetid', '$question', '$answer')";
                        }
                        else if ($shipName!=NULL) {
                            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, shipC, question, answer) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', '$shipid', '$question', '$answer')";
                        }
                        else if ($fleetName!=NULL) {
                            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, fleetC, question, answer) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', '$fleetid', '$question', '$answer')";
                        }
                        else{
                            $query = "INSERT INTO users (Username, Fname, Lname, Pname, Password, salt, question, answer) VALUES ('$Username', '$firstName', '$lastName', '$pirateName', '$passhold', '$salt', '$question', '$answer')";
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
                    <p><label>Select Secutiry Question</label></p>
                    <p>
                        <select name="question" style="margin-left: 1em; margin-bottom: 0.5em">
                            <option value="0">What is the name of your first pet?</option>
                            <option value="1">What is the name of your favorite book?</option>
                            <option value="2">What is the name of your favorite teacher in school?</option>
                            <option value="3">Where was your first full time job?</option>
                            <option value="4">What is the name of your third-grade teacher?</option>
                            <option value="5">Where were you when you had your first alcoholic drink(or cigarette, joint etc.)?</option>
                        </select>
                    </p>
                    <p>
                        <label for="Answer" style="font-family: pirates">Answer:</label>
                        <input type="text" name="answer" id="answer" style="width: 12em;" required>
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
</div></div>
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