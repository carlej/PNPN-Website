<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<title>Register</title>
	</head>
	<body>

<div class ="container">
    <div class = "d-flex justify-content-center" id = "RegisterWindow" >

		<form method="post" action="Javascript/makeuser.php" name="Register" onsubmit="return valadate();" id="addForm" >	

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
	<p style="margin-bottom: -0.4em;">
        <label for="Password" style="font-family: pirates;">Password:</label>
        <input type="text" name="Password" id="Password" minlength="5" maxlength="20" style="width: 12em;" required>
    </p>
			<div style="font-family: pirates; font-size: 0.8em; display:inline-block; margin-bottom: 0.4em">(Password requirement: 5-20 characters)</div>
    <p>
        <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
        <input type="text" name="ConfirmPassword" id="ConfirmPassword" minlength="5" maxlength="20" style="width: 12em;" required>
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit" style="font-family: pirates"/>
        <input type = "reset"  value = "Clear Form" style="font-family: pirates" />
      </p>
        <div id="buttons" class="align-center" style="font-family: pirates">
        <a href="/PNPN-Website/login.php" style="color:black; text-decoration: none;">Back to Login</a>
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
            url: 'http://localhost/PNPN-Website/Javascript/valuse.php',
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