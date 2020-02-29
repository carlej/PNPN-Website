<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php");
        include 'Javascript/Connections/convar.php';
        $con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
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
                    $queryIn = "SELECT * FROM users where Username='$Username' ";
                    $resultIn = mysqli_query($con, $queryIn);
                    if (mysqli_num_rows($resultIn)>0) {
                        //error code for user already exists?>
                        <form method="POST" id="addForm" >  
                            <fieldset>
                                <legend style="font-family: pirates; font-size: 1.6em;">Registration:</legend>
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
                                <p>
                                    <label for="shipName" style="font-family: pirates">Ship/Household Name:</label>
                                    <input type="text" name="shipName" id="shipName" style="width: 12em;">
                                </p>
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
                                    <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                    <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='register.php';"/>
                                </p>
                                <div id="buttons" class="align-center" style="font-family: pirates">
                                <a href="login.php" style="color:black; text-decoration: none;">Back to Login</a>
                                </div>
                            </fieldset>
                        </form><?php
                    }
                    else if ($_POST['shipName']!=NULL && $_POST['fleetName']!=NULL) {
                            $array = NULL;
                            $array = $resultShip->fetch_all(MYSQLI_NUM);
                            ?>
                            <form method="POST" id="SearchBy2">
                                <fieldset>
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
	                                <fieldset>
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
                                <input type="text" name="shipName" id="shipName" style="width: 12em;"><?php if (mysqli_num_rows($resultShip)==0) {
                                	echo '<div class="container" id = "NoneFound" style="margin-top: 0em">There is no Ship or Household by that name!</div>';
                                }
                                 ?>
                            </p>
                            <p>
                                <label for="fleetName" style="font-family: pirates">Fleet/Alliance Name:</label>
                                <input type="text" name="fleetName" id="fleetName" style="width: 12em;"> <?php 
                                if (mysqli_num_rows($resultFleet)==0) {
                                	echo '<div class="container" id = "NoneFound" style="margin-top: 0em">There is no Fleet or Alliance by that name!</div>';
                                }
                                ?>
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="login.php" style="color:black; text-decoration: none;">Back to Login</a>
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
                                <fieldset>
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
                                <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Ship or Household by that name!</div>
                            </p>
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="login.php" style="color:black; text-decoration: none;">Back to Login</a>
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
                                <fieldset>
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
                                <div class="container" id = "NoneFound" style="margin-top: 0em">There is no Fleet or Alliance by that name!</div>
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
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="login.php" style="color:black; text-decoration: none;">Back to Login</a>
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
                        	<p>
                                <label for="Password" style="font-family: pirates;">Password:</label>
                                <input id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" required>
                            </p>

                            <p>
                                <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
                                <input id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" required>
                            </p>
                        
                            <p>
                                <input type = "submit"  name= "submit" value = "Submit" style="font-family: pirates"/>
                                <input type = "reset"  value = "Clear Form" style="font-family: pirates" onclick="location.href='register.php';"/>
                            </p>
                            <div id="buttons" class="align-center" style="font-family: pirates">
                            <a href="login.php" style="color:black; text-decoration: none;">Back to Login</a>
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
