<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<title>Register</title>
	</head>
	<body class = "RegistrationPage">

<div class ="container">
    <div class = "d-flex justify-content-center" id = "RegisterWindow" >

		<form method="post" action="Javascript/makeuser.php" name="Register" onsubmit="return valadate();" id="addForm" >	

	<legend style="font-family: pirates; font-size: 1.6em; margin-bottom: 1em;"> Captain/Head of House Registration:</legend>
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
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" style="font-family: pirates"/>
        <input type = "reset"  value = "Clear Form" style="font-family: pirates" />
      </p>
        <div id="buttons" class="align-center" style="font-family: pirates">
        </div>
</form>
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