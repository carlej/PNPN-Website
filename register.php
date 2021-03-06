<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
        include 'Javascript/Connections/convar.php';
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        } ?>

		<title>Register</title>
	</head>
	<body class = "RegistrationPage">

        <div class ="container">
            <div class = "d-flex justify-content-center" id = "RegisterWindow" >
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit"): 
                    $Username = mysqli_real_escape_string($con, $_POST['Username']);
                    $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
                    $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
                    $pirateName = mysqli_real_escape_string($con, $_POST['pirateName']);
                    $shipName = mysqli_real_escape_string($con, $_POST['shipName']);
                    $fleetName = mysqli_real_escape_string($con, $_POST['fleetName']);
                    $Password = mysqli_real_escape_string($con, $_POST['password']);
                    $confPass = mysqli_real_escape_string($con, $_POST['password_two']);
                    $queryIn = "SELECT * FROM users where Username='$Username' ";
                    $resultIn = mysqli_query($con, $queryIn);
                    if (mysqli_num_rows($resultIn)>0 || ($Password != $confPass)) {
                        //error code for user already exists?>
                        <form method="POST" id="addForm" >  
                            <fieldset>
                                <legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                                <p>
                                    <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                    <?php if($shipName!=NULL): ?>
                                        <input type="text" name="shipName" id="shipName" value='<?php echo $shipName;?>' style="width: 12em;">
                                    <?php else: ?>
                                        <input type="text" name="shipName" id="shipName" style="width: 12em;">
                                    <?php endif; ?>
                                </p>
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
                                    <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                    <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='/PNPN-Website/register.php';"/>
                                </p>
                                <div id="buttons" class="align-center" style="font-family: pirates">
                                <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
                                </div>
                            </fieldset>
                        </form><?php
                    }
                    else if($_POST['shipName']==NULL && $_POST['fleetName']==NULL){
                    	include 'Javascript/makeuser.php';
                    }
                    else if ($_POST['shipName']!=NULL && $_POST['fleetName']!=NULL) {
                        $queryShip = "SELECT * FROM ship WHERE Name LIKE '%$shipName%'";
                        $resultShip = mysqli_query($con, $queryShip);
                        $queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$fleetName%'";
                        $resultFleet = mysqli_query($con, $queryFleet);
                        if (mysqli_num_rows($resultShip)>1 && mysqli_num_rows($resultFleet)>0) {
                            $array = NULL;
                            $array = $resultShip->fetch_all(MYSQLI_NUM);
                            ?>
                            <form method="POST" id="SearchBy2">
                                <fieldset style="font-family: pirates">
                                    <label>Select: </label><select name="shipName">
                                    <?php foreach ($array as $key => $value) {//this will desplay the name of each captain as each should be different
                                    //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                                        $queryNest = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
                                        $resultNest = mysqli_query($con, $queryNest);
                                        echo $value[0];
                                        $row = mysqli_fetch_row($resultNest);
                                        if ($row[5]!=NULL) {
                                            $nameUnedit=$row[5];
                                        }
                                        else{
                                            $nameUnedit=$row[3].' '.$row[4];
                                        }
                                        $capname=str_replace(' ', '&nbsp;', $nameUnedit);
                                        echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
                                        } ?>
                                    </select>
                                    <label for="name">   </label>

                                    <input type="hidden"  name="Username" value=<?php echo $Username; ?>>
                                    <input type="hidden" name="firstName" value=<?php echo $firstName; ?>>
                                    <input type="hidden" name="lastName" value=<?php echo $lastName; ?>>
                                    <input type="hidden" name="pirateName" value=<?php echo $pirateName; ?>>

                                    <?php 
                                    if (mysqli_num_rows($resultFleet)==1) {
                                    	echo '<input type="hidden" name="fleetName" value='.$fleetName.'>';
                                    }
                                    ?>
                                    <input type="hidden" name="password" value=<?php echo $Password; ?>>
                                    <?php 
                                    if (mysqli_num_rows($resultFleet)==1): ?>
			                                    <input type="submit" name="submit" value="Submit">
			                                    <input type="submit" name="submit" value="Clear" />
			                                </fieldset>
			                            </form>
                        			<?php endif; ?><?php
                        }
                        if (mysqli_num_rows($resultFleet)>1 && mysqli_num_rows($resultShip)>0) {
                            $array = NULL;
                            $array = $resultFleet->fetch_all(MYSQLI_NUM);
                            ?>
                            <?php if (mysqli_num_rows($resultShip)==1): ?>
	                            <form method="POST" id="SearchBy2">
	                                <fieldset style="font-family: pirates">
                            <?php endif;?>
                                    <label>Select: </label><select name="fleetName">
                                    <?php foreach ($array as $key => $value) {//this will desplay the name of each captain as each should be different
                                    //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                                        $queryNest = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
                                        $resultNest = mysqli_query($con, $queryNest);
                                        echo $value[0];
                                        $row = mysqli_fetch_row($resultNest);
                                        if ($row[5]!=NULL) {
                                            $nameUnedit=$row[5];
                                        }
                                        else{
                                            $nameUnedit=$row[3].' '.$row[4];
                                        }
                                        $capname=str_replace(' ', '&nbsp;', $nameUnedit);
                                        echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
                                        } ?>
                                    </select>
                                    <label for="name">   </label>
                                    <input type="hidden"  name="Username" value=<?php echo $Username; ?>>
                                    <input type="hidden" name="firstName" value=<?php echo $firstName; ?>>
                                    <input type="hidden" name="lastName" value=<?php echo $lastName; ?>>
                                    <input type="hidden" name="pirateName" value=<?php echo $pirateName; ?>>
                                    <?php 
                                    if (mysqli_num_rows($resultShip)==1) {
                                    	echo '<input type="hidden" name="shipName" value='.$shipName.'>';
                                    }
                                    ?>
                                    <input type="hidden" name="password" value=<?php echo $Password; ?>>
                                    <input type="submit" name="submit" value="Submit">
                                    <input type="submit" name="submit" value="Clear" />
                                </fieldset>
                            </form><?php
                        }
                        else if (mysqli_num_rows($resultShip)==1 && mysqli_num_rows($resultFleet)==1) {
                        	include 'Javascript/makeuser.php';
                        }
                        else if(mysqli_num_rows($resultShip)==0 || mysqli_num_rows($resultFleet)==0){
                            
                            ?>
                            <form method="POST" id="addForm" >  
                        <fieldset>
                            <legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                            <p>
                                <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                <input type="text" name="shipName" id="shipName" style="width: 12em;">
                                <?php if(mysqli_num_rows($resultShip)==0): ?>
                                    <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Ship/Household by that name please see a teller for help!</div> 
                                <?php endif; ?>
                            </p>
                            <p>
                                <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                                <input type="text" name="fleetName" id="fleetName" style="width: 12em;">
                                <?php if(mysqli_num_rows($resultFleet)==0): ?>
                                    <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Fleet/Alliance by that name please see a teller for help!</div> 
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='/PNPN-Website/register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
                            </div>
                        </fieldset>
                    </form><?php
                        }

                    }
                    else if ($_POST['shipName']!=NULL) {
                        $queryShip = "SELECT * FROM ship WHERE Name LIKE '%$shipName%'";
                        $resultShip = mysqli_query($con, $queryShip);
                        if (mysqli_num_rows($resultShip)>1) {
                            $array = NULL;
                            $array = $resultShip->fetch_all(MYSQLI_NUM);
                            ?>
                            <form method="POST" id="SearchBy2">
                                <fieldset style="font-family: pirates">
                                    <label>Select: </label><select name="shipName">
                                    <?php foreach ($array as $key => $value) {//this will desplay the name of each captain as each should be different
                                    //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                                        $queryNest = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
                                        $resultNest = mysqli_query($con, $queryNest);
                                        echo $value[0];
                                        $row = mysqli_fetch_row($resultNest);
                                        if ($row[5]!=NULL) {
                                            $nameUnedit=$row[5];
                                        }
                                        else{
                                            $nameUnedit=$row[3].' '.$row[4];
                                        }
                                        $capname=str_replace(' ', '&nbsp;', $nameUnedit);
                                        echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
                                        } ?>
                                    </select>
                                    <label for="name">   </label>
                                    <input type="submit" name="submit" value="Submit">
                                    <input type="hidden"  name="Username" value=<?php echo $Username; ?>>
                                    <input type="hidden" name="firstName" value=<?php echo $firstName; ?>>
                                    <input type="hidden" name="lastName" value=<?php echo $lastName; ?>>
                                    <input type="hidden" name="pirateName" value=<?php echo $pirateName; ?>>
                                    <input type="hidden" name="fleetName">
                                    <input type="hidden" name="password" value=<?php echo $Password; ?>>
                                    <input type="submit" name="submit" value="Clear" />
                                </fieldset>
                            </form><?php
                        }
                        else if (mysqli_num_rows($resultShip)==1) {
                            include 'Javascript/makeuser.php';
                        }
                        else{
                            
                            ?>
                            <form method="POST" id="addForm" >  
                        <fieldset>
                            <legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                            <p>
                                <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                <input type="text" name="shipName" id="shipName" style="width: 12em;">
                                <?php if(mysqli_num_rows($resultShip)==0): ?>
                                    <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Ship/Household by that name please see a teller for help!</div> 
                                <?php endif; ?>
                            </p>
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='/PNPN-Website/register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
                            </div>
                        </fieldset>
                    </form><?php
                        }
                    }
                    else if ($_POST['fleetName']!=NULL){
                        $queryFleet = "SELECT * FROM fleet WHERE Name LIKE '%$fleetName%'";
                        $resultFleet = mysqli_query($con, $queryFleet);
                        if (mysqli_num_rows($resultFleet)>1) {
                            $array = NULL;
                            $array = $resultFleet->fetch_all(MYSQLI_NUM);
                            ?>
                            <form method="POST" id="SearchBy2">
                                <fieldset style="font-family: pirates">
                                    <label>Select: </label><select name="fleetName">
                                    <?php foreach ($array as $key => $value) {//this will desplay the name of each captain as each should be different
                                    //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                                        $queryNest = "SELECT * FROM users WHERE Username LIKE '%$value[2]%'";
                                        $resultNest = mysqli_query($con, $queryNest);
                                        echo $value[0];
                                        $row = mysqli_fetch_row($resultNest);
                                        if ($row[5]!=NULL) {
                                            $nameUnedit=$row[5];
                                        }
                                        else{
                                            $nameUnedit=$row[3].' '.$row[4];
                                        }
                                        $capname=str_replace(' ', '&nbsp;', $nameUnedit);
                                        echo '<option value="'.$value[1].'">"Captain: " '.$capname.'</option>';
                                        } ?>
                                    </select>
                                    <label for="name">   </label>
                                    <input type="submit" name="submit" value="Submit">
                                    <input type="hidden"  name="Username" value=<?php echo $Username; ?>>
                                    <input type="hidden" name="firstName" value=<?php echo $firstName; ?>>
                                    <input type="hidden" name="lastName" value=<?php echo $lastName; ?>>
                                    <input type="hidden" name="pirateName" value=<?php echo $pirateName; ?>>
                                    <input type="hidden" name="shipName">
                                    <input type="hidden" name="password" value=<?php echo $Password; ?>>
                                    <input type="submit" name="submit" value="Clear" />
                                </fieldset>
                            </form><?php
                        }
                        else if (mysqli_num_rows($resultFleet)==1) {
                            include 'Javascript/makeuser.php';
                        }
                        else{
                            
                            ?>
                            <form method="POST" id="addForm" >  
                        <fieldset>
                            <legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                            <p>
                                <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                <input type="text" name="shipName" id="shipName" style="width: 12em;">
                            </p>
                            <p>
                                <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                                <input type="text" name="fleetName" id="fleetName" style="width: 12em;">
                                <?php if(mysqli_num_rows($resultFleet)==0): ?>
                                    <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Fleet/Alliance by that name please see a teller for help!</div> 
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='/PNPN-Website/register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
                            </div>
                        </fieldset>
                    </form><?php
                        }
                    }?>
                <?php else: ?>
            		<form method="POST" id="addForm" >	
                        <fieldset>
                        	<legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                            <p>
                                <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                <input type="text" name="shipName" id="shipName" style="width: 12em;">
                            </p>
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
                                <input id="password" name="password" type="password" minlength="6" required>
                            </p>

                            <p>
                                <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
                                <input id="password_two" name="password_two" type="password" minlength="6" required>
                            </p>
                        
                            <p>
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='/PNPN-Website/register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
                            </div>
                        </fieldset>
                    </form>
                <?php endif;?>
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
