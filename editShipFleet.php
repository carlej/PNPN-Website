<?php //This is the same as for fleet but for a new fleet there is no differnece between the two at this time?>

<!doctype html>
<html>
    <head>
        <?php 
        include("Javascript/Connections/req.php"); 
        if ($_SESSION['perm']!="b" && $_SESSION['perm']!="z") {
            ?><script type="text/javascript">window.location.href="bank.php"</script><?php
        }
        include 'Javascript/Connections/convar.php';
        $con = new mysqli($_SERVER['RDS_HOSTNAME'], $_SERVER['RDS_USERNAME'], $_SERVER['RDS_PASSWORD'], $_SERVER['RDS_DB_NAME'], $_SERVER['RDS_PORT']);
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        //echo $_SESSION['clear'];
        ?>


        <title>Edit Ship/Fleet</title>

    </head>

    <body id="EditShipFleetPage">
        <?php
        $input = $_SESSION['hold'];
        if ($_SESSION['stype']=='shipID') {
            $queryIn = "SELECT * FROM ship WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            $queryUser = "SELECT * FROM users WHERE Username = '$row[2]'";
            $resultUser = mysqli_query($con, $queryUser);
            $rowUser = mysqli_fetch_row($resultUser);
            if ($rowUser[5]==NULL) {
                $name = $rowUser[3].' '.$rowUser[4];
            }
            else
                $name = $rowUser[5];
            ?>
            <div class="container-flow">
                <div class="d-flex" id="EditShipFleet">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div>Leader: <?php echo $name; ?></div><?php
                                    if ($_SERVER["REQUEST_METHOD"] != "POST") {
                                    ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">Select a new Leader: </div>
                        </div>
                        <form method="POST">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12">
                                        <select name="type">
                                            <option>Search By:</option>
                                            <option value="Pname">Pirate Name</option>
                                            <option value="Fname">First Name</option>
                                            <option value="Lname">Last Name</option>
                                            <option value="Username">Email</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="text" name="leader" minlength="3">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Submit">
                                        <input type="button" value="Cancel" onclick="location.href='teller.php';">
                                        <input type="hidden" name="tansfer" value="1">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            }
            else{
                $user = mysqli_real_escape_string($con,$_POST['leader']);
                $method = $_POST['type'];
                $queryUser = "SELECT * FROM users WHERE `$method` LIKE '%$user%'";
                $resultUser = mysqli_query($con, $queryUser);
                if (mysqli_num_rows($resultUser)>1) {
                    $array = $resultUser->fetch_all(MYSQLI_NUM); 
                    echo '<label>Search by: </label><form method="POST"><fieldset><select name="leader">';
                    //echo '<form method="post" id = "select">';
                    foreach ($array as $key => $value) {
                    //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                    echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
                    }
                    //echo '</form>';
                    echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Submit"><input type="hidden" name="type" value="Username">'; ?>
                    <input type="button" value="Cancel" onclick="location.href='teller.php';">
                    <?php 
                    echo '</fieldset></form>';
                    }
                     else if (mysqli_num_rows($resultUser)==0){ ?>
                    <label>Leader: </label>
                        <form method="POST">
                            <fieldset>
                                <select name="type">
                                    <option>Search By:</option>
                                    <option value="Pname">Pirate Name</option>
                                    <option value="Fname">First Name</option>
                                    <option value="Lname">Last Name</option>
                                    <option value="Username">Email</option>
                                </select>
                                <input type="text" name="leader" minlength="3">
                                <input type="hidden" name="tansfer" value="1">
                                        <input type="submit" name="submit" value="Submit">
                                        <input type="button" value="Cancel" onclick="location.href='teller.php';">
                                        <div class="container" id = "NoneFound" style="margin-top: 0em">There are no users that match this Email!</div>
                            </fieldset>
                        </form>
                <?php
                }
                else{
                    $row = mysqli_fetch_row($resultUser);
                    $user = $row[0];
                    $timeStamp=date('Y/m/d H:i:s');
                    $tellerTemp=$_SESSION['username'];
                    $queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
                    $resultInTeller = mysqli_query($con, $queryInTeller);
                    $rowTeller=mysqli_fetch_row($resultInTeller);
                    $space=' ';
                    $teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";
                    $queryShip="SELECT * FROM ship WHERE ID = '$input'";
                    $resultShip= mysqli_query($con, $queryShip);
                    $rowShip=mysqli_fetch_row($resultShip);
                    $parsed_jsonShip=json_decode($rowShip[5],true);
                    $hist=[$teller,$rowShip[2]];
                    $parsed_jsonShip[$timeStamp]=$hist;
                    $enco_jsonShip=json_encode($parsed_jsonShip);
                    $NOSPECIALCHARACERS = mysqli_real_escape_string($con, $enco_jsonShip);
                    $queryShipUpdate="UPDATE ship SET hist = '$NOSPECIALCHARACERS', Captain = '$user' WHERE ID = '$input'";
                    $resultShipUpdate=mysqli_query($con,$queryShipUpdate);
                    $queryUpdateUser = "UPDATE users SET Ship = '$input', shipC = '$input' WHERE Username = '$user'";
                    $resultUpdateUser = mysqli_query($con, $queryUpdateUser);
                    //echo'<script type="text/javascript">alert("Owner changed");</script>';
                    header('Location: /teller.php');
                }
            }
         }
        else if ($_SESSION['stype']=='fleetID') {
            $queryIn = "SELECT * FROM fleet WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            $queryUser = "SELECT * FROM users WHERE Username = '$row[2]'";
            $resultUser = mysqli_query($con, $queryUser);
            $rowUser = mysqli_fetch_row($resultUser);
            if ($rowUser[5]==NULL) {
                $name = $rowUser[3].' '.$rowUser[4];
            }
            else
                $name = $rowUser[5];
            ?>
            <div class="container-flow">
                <div class="d-flex" id="EditShipFleet">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div>Leader: <?php echo $name; ?></div>
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] != "POST") {
                            ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Select a new Leader: </label>
                            </div>
                        </div>
                        <form method="POST">
                            <fieldset>
                                <div class="row">
                                    <div class="col-12">
                                        <select name="type">
                                            <option>Search By:</option>
                                            <option value="Pname">Pirate Name</option>
                                            <option value="Fname">First Name</option>
                                            <option value="Lname">Last Name</option>
                                            <option value="Username">Email</option>
                                        </select>
                                        <input type="text" name="leader" minlength="3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Submit">
                                        <input type="button" value="Cancel" onclick="location.href='teller.php';">
                                        <input type="hidden" name="tansfer" value="1">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            else{
                $user = mysqli_real_escape_string($con,$_POST['leader']);
                $method = $_POST['type'];
                $queryUser = "SELECT * FROM users WHERE `$method` LIKE '%$user%'";
                $resultUser = mysqli_query($con, $queryUser);
                if (mysqli_num_rows($resultUser)>1) {
                    $array = $resultUser->fetch_all(MYSQLI_NUM); ?>
                <?php echo '<label>Search by: </label><form method="POST"><fieldset><select name="leader">';
                        //echo '<form method="post" id = "select">';
                        foreach ($array as $key => $value) {
                        //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                        echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
                        }
                        //echo '</form>';
                        echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Submit"><input type="hidden" name="type" value="Username"></fieldset></form>';
                    }
                    else if (mysqli_num_rows($resultUser)==0){ ?>
                    <label>Leader: </label>
                    <form method="POST">
                        <fieldset>
                            <select name="type">
                                <option>Search By:</option>
                                <option value="Pname">Pirate Name</option>
                                <option value="Fname">First Name</option>
                                <option value="Lname">Last Name</option>
                                <option value="Username">Email</option>
                            </select>
                            <input type="text" name="leader" minlength="3">
                            <input type="hidden" name="tansfer" value="1">
                            <input type="submit" name="submit" value="Submit">
                            <input type="button" value="Cancel" onclick="location.href='teller.php';">
                            <div class="container" id = "NoneFound" style="margin-top: 0em">There is not match for that search!</div>
                        </fieldset>
                    </form>
                <?php
                }
                else{
                    $row = mysqli_fetch_row($resultUser);
                    $user = $row[0];
                    $timeStamp=date('Y/m/d H:i:s');
                    $tellerTemp=$_SESSION['username'];
                    $queryInTeller = "SELECT * FROM users WHERE Username = '$tellerTemp'";
                    $resultInTeller = mysqli_query($con, $queryInTeller);
                    $rowTeller=mysqli_fetch_row($resultInTeller);
                    $space=' ';
                    $teller="{$rowTeller[3]}{$space}{$rowTeller[4]}";
                    $queryFleet="SELECT * FROM fleet WHERE ID = '$input'";
                    $resultFleet= mysqli_query($con, $queryFleet);
                    $rowFleet=mysqli_fetch_row($resultFleet);
                    $parsed_jsonFleet=json_decode($rowFleet[5],true);
                    $hist=[$teller,$rowFleet[2]];
                    $parsed_jsonFleet[$timeStamp]=$hist;
                    $enco_jsonFleet=json_encode($parsed_jsonFleet);
                    $NOSPECIALCHARACERS = mysqli_real_escape_string($con, $enco_jsonFleet);
                    $queryFleetUpdate="UPDATE fleet SET hist = '$NOSPECIALCHARACERS', Admiral = '$user' WHERE ID = '$input'";
                    echo $queryFleetUpdate;
                    $resultFleetUpdate=mysqli_query($con,$queryFleetUpdate);
                    $queryUpdateUser = "UPDATE users SET Fleet = '$input', fleetC = '$input' WHERE Username = '$user'";
                    $resultUpdateUser = mysqli_query($con, $queryUpdateUser);
                    //echo'<script type="text/javascript">alert("Owner changed");</script>';
                    header('Location: /teller.php');
                }
            }
        } 
        ?>
        
    </body>
</html>

