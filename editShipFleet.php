<?php //This is the same as for fleet but for a new fleet there is no differnece between the two at this time?>

<!doctype html>
<html>
    <head>
        <?php 
        if ($_SESSION['perm']!="b" || $_SESSION['perm']!="z") {
            ?><script type="text/javascript">window.location.href="bank.php"</script><?php
        }
        include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        //echo $_SESSION['clear'];
        ?>


        <title>Edit ship/fleet</title>

    </head>

    <body>
        <?php
        $input = $_SESSION['hold'];
        if ($_SESSION['stype']=='shipID') {
            $queryIn = "SELECT * FROM ship WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            if ($_SERVER["REQUEST_METHOD"] != "POST") {
            ?>
                <li>
                    <label>Leader: </label>
                    <form method="POST">
                        <fieldset>
                            <input type="email" name="leader" value='<?php echo $row[2]; ?>'>
                            <input type="submit" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </li>
            <?php
            }
            else{
                $user = $_POST['leader'];
                $queryUser = "SELECT * FROM users WHERE Username = '$user'";
                echo $queryUser;
                $resultUser = mysqli_query($con, $queryUser);
                $rowUser = mysqli_fetch_row($resultUser);
                if (mysqli_num_rows($resultUser)==0){ ?>
                    <li>
                        <label>Leader: </label>
                        <form method="POST">
                            <fieldset>
                                <input type="email" name="leader" value='<?php echo $row[2]; ?>'>
                                <div class="container" id = "NoneFound" style="margin-top: 0em">There are no users that match this Email!</div>
                                <input type="submit" name="submit" value="Submit">
                            </fieldset>
                        </form>
                    </li><?php
                }
                else{
                    $queryUpdate = "UPDATE ship SET Captain = '$user' WHERE ID = '$input'";
                    $resultUpdate = mysqli_query($con, $queryUpdate);
                    echo'<script type="text/javascript">alert("Owner changed");</script>';
                    header('Location: /PNPN-Website/teller.php');
                }
            }
         }
        else if ($_SESSION['stype']=='fleetID') {
            $queryIn = "SELECT * FROM fleet WHERE ID = '$input'";
            $resultIn = mysqli_query($con, $queryIn);
            $row = mysqli_fetch_row($resultIn);
            if ($_SERVER["REQUEST_METHOD"] != "POST") {
            ?>
                <li>
                    <label>Leader: </label>
                    <form method="POST">
                        <fieldset>
                            <input type="email" name="leader" value='<?php echo $row[2]; ?>'>
                            <input type="submit" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </li>
            <?php
            }
            else{
                $user = $_POST['leader'];
                $queryUser = "SELECT * FROM users WHERE Username = '$user'";
                echo $queryUser;
                $resultUser = mysqli_query($con, $queryUser);
                $rowUser = mysqli_fetch_row($resultUser);
                if (mysqli_num_rows($resultUser)==0){ ?>
                    <li>
                        <label>Leader: </label>
                        <form method="POST">
                            <fieldset>
                                <input type="email" name="leader" value='<?php echo $row[2]; ?>'>
                                <div class="container" id = "NoneFound" style="margin-top: 0em">There are no users that match this Email!</div>
                                <input type="submit" name="submit" value="Submit">
                            </fieldset>
                        </form>
                    </li><?php
                }
                else{
                    $queryUpdate = "UPDATE fleet SET Admiral = '$user' WHERE ID = '$input'";
                    $resultUpdate = mysqli_query($con, $queryUpdate);
                    echo'<script type="text/javascript">alert("Owner changed");</script>';
                    header('Location: /PNPN-Website/teller.php');
                }
            }
        } 
        ?>
        
    </body>
</html>

