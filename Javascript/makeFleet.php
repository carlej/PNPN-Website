<?php //this file makes a new fleet/group
    
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$name = mysqli_real_escape_string($con, $_POST['name']);
$leaderName = mysqli_real_escape_string($con, $_SESSION['hold']);
srand(time());
$fleetid=rand(1000,9999); //makes a fleet id so that i dont have a large amount of strings in users to slim the db down a little
$queryIn = "SELECT ID FROM fleet WHERE ID = '$fleetid'";
$resultIn = mysqli_query($con, $queryIn);
$row=mysqli_fetch_row($resultIn);
//chances are that it will not need to make more then one ID for the fleet but i still have it check and loop just in case.
do{
if (mysqli_num_rows($resultIn)==0) {
    //echo $fleetid;
    $b=false;
    do{ //this loop is the same as in make users to make an account for the fleet
        srand(time());
        $id=rand(100000000,999999999);
        $queryIn = "SELECT ID FROM accounts WHERE ID = '$id'";
        $resultIn = mysqli_query($con, $queryIn);
        $row=mysqli_fetch_row($resultIn);
        //echo $queryIn;
        if (mysqli_num_rows($resultIn)==0) {
            //echo $id;
            $a=false;
            $accs="{\"id\": [";
            $accs.=$id.", 0]}";
            $insert = "INSERT INTO accounts (ID) VALUES ('$id')";
            $inResult = mysqli_query($con, $insert); //Updates the DB with the new account
            $update = "UPDATE fleet SET Accounts = '$accs' WHERE fleet.ID = '$fleetid'";
        }
    }while($a);
    $query = "INSERT INTO fleet (ID, Name, Admiral) VALUES ('$fleetid', '$name', '$leaderName')";
    echo $query;
    if (mysqli_query($con,$query)) {
        $updateuse="UPDATE users SET fleet = '$fleetid' WHERE users.username='$leaderName'";
        $upuser=mysqli_query($con, $updateuse);
        $inup= mysqli_query($con, $update); //Updates the users DB section to show ownerfleet of the new account.
        $_SESSION['hold']=$fleetid;
        $_SESSION['stype']="fleetID";
        header("Location: /PNPN-Website/teller.php");
    }
    else
        echo "ERROR";//.mysql_error($con);
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