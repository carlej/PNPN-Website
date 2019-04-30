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
	<legend>Group Info:</legend>
    <p>
        <label for="Name">Group Name:</label>
		<input type="text" class="required" name="name" id="name">    
    </p>
    <p>
        <label for="firstName">Leader:</label>
        <input type="text" class="required" name="leader" id="leader">
    </p>
</fieldset>

      <p>
        <input type = "submit"  value = "Submit Fleet" />
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
            url: 'http://localhost/SDN-Website/Javascript/valuse.php',
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