

<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Account</title>
        <?php include("Views\Partials/header.php");?>

    </head>
    <body>
    	<div class = "container" id = "AccountPage">
            <div class = "d-flex">
                <div class = "col-sm-6">
                	<legend>Account Information:</legend>
                	<p>
                		<label>First Name:</label>
                		<input type="button" value="Edit"/>
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
                	<p>
                		<label>Email:</label>
                	</p>
                	<p>
                		<label>Password:</label>
                	</p>
                </div>
            </div>
        </div>
    </body>
</html>