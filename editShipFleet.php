<?php //This is the same as for fleet but for a new fleet there is no differnece between the two at this time?>

<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        ?>


        <title>Add Fleet</title>

    </head>

    <body class = "AddFleetPage">
        
    </body>
</html>

?>