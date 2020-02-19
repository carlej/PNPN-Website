<!--This will allow Tellers to edit user information-->

<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Edit User</title>

    </head>
    <body>
    	<?php $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
			die('Could not connect: ' . mysql_error());
		} ?>


    	<div class = "container" id = "EditUser">
            <div class = "d-flex justify-content-center">
                <div class = "col-sm-6">
                	<legend>Account Information:</legend>
                	<p>
                		<label>First Name:</label>
                		<input type="button" value="Edit"/>
                		<div id="fn" hidden> Edit First Name:
  							<input type="text" />
						</div>
                	</p>
                	<p>
                		<label>Last Name:</label>
                	</p>
                	<p>
                		<label>Pirate Name:</label>
                	</p>
                	<p>
                		<label>Ship or Household:</label>
                	</p>
                	<p>
                		<label>Fleet or Alliance:</label>
                	</p>
                </div>
            </div>
        </div>
    </body>
</html>

