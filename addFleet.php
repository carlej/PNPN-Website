<?php //This is the same as for fleet but for a new fleet there is no differnece between the two at this time
if ($_SESSION['perm']!="b" || !$_SESSION['perm']!="z") {
    ?><script type="text/javascript">window.location.href="bank.php"</script><?php
}
?>


<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Add Fleet</title>

    </head>

    <body class = "AddFleetPage">
        <div class = "container" id = "AddFleetAlliance">
            <div class = "d-flex justify-content-center">
                <div class = "col-sm-5">
                    <form method="post" name="Register" id="addfleetForm">
                        <fieldset>
                            <legend>Add A Fleet or Alliance:</legend>
                            <p>
                                <label for="Name">Name:</label>
                                <input type="text" name="groupName" style="width: 90%" required>
                                    <?php
                                    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                                    if (!$con) {
                                        die('Could not connect: ' . mysql_error());
                                    }
                                    $method = $_SESSION['stype'];
                                    $input = $_SESSION['hold'];
                                    //echo $input;
                                    //echo $method;
                                    $queryIn = "SELECT * FROM users WHERE `$method` = '$input'";
                                    $resultIn = mysqli_query($con, $queryIn);

                                    if (mysqli_num_rows($resultIn)==1) { //returns the one account that was found or selected
                                        $searched=true;
                                        $row = mysqli_fetch_row($resultIn);
                                        $username=$row[0];
                                        $nameUnedit=NULL;
                                        $havefleet = $row[6];
                                        if ($row[5]!=NULL) {
                                            $nameUnedit=$row[5];
                                        }
                                        else{
                                            $nameUnedit=$row[3].' '.$row[4];
                                        }
                                        $name=str_replace(' ', '&nbsp;', $nameUnedit);
                                        mysqli_close($con);
                                    }
                            //        echo '<input type="text" class="required" value="'.$_SESSION['stype'].'"name="name" id="name">';
                            //        echo '<label for="Leader search">Leader:</label><input type="search" class="required" value="'.$_SESSION['hold'].'"name="input" id="input">';
                                    ?>
                                <label for="Name">Leader:</label>
                                <input disabled style="width: 90%" value=<?php echo $name; ?>>
                                <input type="hidden" name="learder" value=<?php echo $username; ?>> 
                            </p>
                        </fieldset>
                        <p>
                            <input type = "submit" name= "submit" value = "Submit" />
                            <input type="button" name="button" value="Cancel" onclick="location.href='Javascript/clearsome.php';" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['groupName']){
    if ($havefleet!=NULL) {
        echo "You already have a fleet";
    }
    else{
        echo "here";
        include ("Javascript/makeFleet.php");
    }
}

?>
<script type="text/javascript">
    function Cancel(){
        $.ajax({url:'http://Javascript/cancel.php',success: function(){window.location.assign("http://teller.php")}});
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
//mysqli_close($con);

?>