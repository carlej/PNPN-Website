<?php //This is the register file this can have as much or as little info collected as we want?>
<!doctype html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<meta name="viewport" content="width=device-width, user-scalable=no">

		<title>Register</title>
		<?php include("Views\Partials/header.php");?>
	</head>
	<body>

		<form method="post" action="Javascript/makeuser.php" name="Register" onsubmit="return valadate();" id="addForm" >											
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
        <input type="email" class="required" name="email" id="email">
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
