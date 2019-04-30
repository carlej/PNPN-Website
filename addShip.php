<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <meta name="viewport" content="width=device-width, user-scalable=no">

        <title>Register</title>
        <?php include("Views\Partials/header.php");?>
    </head>
    <body>

        <form method="post" name="Register" onsubmit="return valadate();" id="addForm" >                                            
<fieldset>
    <legend>Group Info:</legend>
    <p>
        <label for="Name">Group Name:</label>
        <?php
        if($_SESSION['hold']=="hold"){
            echo '<input type="text" class="required" name="name" id="name">';
            echo '<p><label for="Leader search">Search for Leader:</label>
        <select name="type"><option value="Username">Username</option><option value="Pname">Pirate Name</option><option value="Fname">First Name</option><option value="Lname">Last Name</option><option value="Email">Email</option><option value="Pnumber">Phone Number</option><option value="Sposition">Staff Position</option><option value="Rposition">Royalty Position</option></select><label for="input">:</label><input type="search" class="required" name="input" id="input"><input type="submit" name= "submit" value="Search"></p>';
        }
        else{
            echo '<input type="text" class="required" value="'.$_SESSION['stype'].'"name="name" id="name">';
            echo '<label for="Leader search">Leader:</label><input type="search" class="required" value="'.$_SESSION['hold'].'"name="input" id="input">';
        }
        ?>
        
    </p>
</fieldset>

      <p>
        <input type = "submit" name= "submit" value = "Submit ship" />
        <input type = "reset"  value = "Clear Form" />
        <input type="button" name="button" value="Cancel" onclick="Cancel()" />
      </p>
</form>
    </body>

</html>
<script type="text/javascript">
    function Cancel(){
        $.ajax({url:'http://localhost/SDN-Website/Javascript/cancel.php',success: function(){window.location.assign("http://localhost/SDN-Website/teller.php")}});
    }
    function valadate(){
        var name = document.forms["Register"]["name"].value;
        var leader = document.forms["Register"]["leader"].value;
        if (name=="") {
            alert("Name cannot be blank. Please input a name.");
            return false;
        }
        else if (leader=="") {
            alert("Leader cannot be blank. Please input a leader.");
            return false;
        }
        else
            return true;
    }
</script>
<?php
//$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//    if (!$con) {
//        die('Could not connect: ' . mysql_error());
//    }
//$_SESSION['stype']=mysqli_real_escape_string($con, $_POST['name']);
//mysqli_close($con);
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Search") {
    include "Javascript/searchship.php";
//    if ($_SESSION['hold']!="hold") {
 //       include "Javascript/makeship.php";
//    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Submit ship") {
//    include "Javascript/searchsim.php";
    if ($_SESSION['hold']!="hold") {
        include "Javascript/makeship.php";
    }
}
?>