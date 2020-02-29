<?php //this file makes a new fleet/house
    
$con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$name = mysqli_real_escape_string($con, $_POST['groupName']);
$leaderName = mysqli_real_escape_string($con, $_POST['learder']);
srand(time());
$fleetid=rand(1000,9999);
$queryIn = "SELECT ID FROM fleet WHERE ID = '$fleetid'";
$resultIn = mysqli_query($con, $queryIn);
$row=mysqli_fetch_row($resultIn);
//chances are that it will not need to make more then one ID for the fleet but i still have it check and loop just in case.
do{
if (mysqli_num_rows($resultIn)==0) {
    //echo $fleetid;
    $b=false;
    $a = true;
    $query = "INSERT INTO fleet (ID, Name, Admiral) VALUES ('$fleetid', '$name', '$leaderName')";
    mysqli_query($con, $query);
    do{ //this loop is the same as in make users to make an accoutn for the new fleet/house
        srand(time());
        $id=rand(100000000,999999999);
        $queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
        $resultIn = mysqli_query($con, $queryIn);
        //echo $queryIn;
        if (mysqli_num_rows($resultIn)==0) {
            //echo $id;
            $a=false;
            $accs="{\"id\": [";
            $accs.=$id.", 0]}";
            $insert = "INSERT INTO accounts (ID) VALUES ('$id')";
            $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
            $updateacc = "UPDATE fleet SET Accounts = '$accs' WHERE fleet.ID = '$fleetid'";
            $updateuse="UPDATE users SET Fleet = '$fleetid' WHERE users.username='$leaderName'";
            $upuser=mysqli_query($con, $updateuse);
            $inup= mysqli_query($con, $updateacc); //Updates the users DB section to show ownerfleet of the new account.
            ?><script type="text/javascript">window.location.href='teller.php'</script><?php
        }
        else
            echo "ERROR";//.mysql_error($con);
    }while($a);
}
else{
    $b=true;
    $fleetid=rand(1000,9999);
    $queryIn = "SELECT ID FROM fleet WHERE ID = '$fleetid'";
    $resultIn = mysqli_query($con, $queryIn);
    $row=mysqli_fetch_row($resultIn);
}
}while($b);
?>