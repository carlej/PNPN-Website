<?php //this file makes a new ship/house
    
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
$name = mysqli_real_escape_string($con, $_POST['name']);
$leaderName = mysqli_real_escape_string($con, $_SESSION['hold']);
srand(time());
$shipid=rand(1000,9999);
$queryIn = "SELECT ID FROM ship WHERE ID = '$shipid'";
$resultIn = mysqli_query($con, $queryIn);
$row=mysqli_fetch_row($resultIn);
//chances are that it will not need to make more then one ID for the ship but i still have it check and loop just in case.
do{
if (mysqli_num_rows($resultIn)==0) {
    //echo $shipid;
    $b=false;
    do{ //this loop is the same as in make users to make an accoutn for the new ship/house
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
            $updateacc = "UPDATE ship SET Accounts = '$accs' WHERE ship.ID = '$shipid'";
        }
    }while($a);
    $query = "INSERT INTO ship (ID, Name, Captain) VALUES ('$shipid', '$name', '$leaderName')";
    echo $query;
    if (mysqli_query($con,$query)) {
        $updateuse="UPDATE users SET ship = '$shipid' WHERE users.username='$leaderName'";
        $upuser=mysqli_query($con, $updateuse);
        $inup= mysqli_query($con, $updateacc); //Updates the users DB section to show ownership of the new account.
        $_SESSION['hold']=$shipid;
        $_SESSION['stype']="shipID";
        header("Location: /PNPN-Website/teller.php");
    }
    else
        echo "ERROR";//.mysql_error($con);
}
else{
    $b=true;
    $shipid=rand(1000,9999);
    $queryIn = "SELECT ID FROM ship WHERE ID = '$shipid'";
    $resultIn = mysqli_query($con, $queryIn);
    $row=mysqli_fetch_row($resultIn);
}
}while($b);
?>