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
                            <select name="type" style="margin-left: 1em; margin-bottom: 0.5em">
                                <option>Search By:</option>
                                <option value="Pname">Pirate Name</option>
                                <option value="Fname">First Name</option>
                                <option value="Lname">Last Name</option>
                                <option value="Username">Email</option>
                            </select>
                            <input type="text" name="leader">
                            <input type="submit" name="submit" value="Submit">
                        </fieldset>
                    </form>
                </li>
            <?php
            }
            else{
                $user = $_POST['leader'];
                $method = $_POST['type'];
                $queryUser = "SELECT * FROM users WHERE '$method' LIKE '%$user%'";
                echo $queryUser;
                $resultUser = mysqli_query($con, $queryUser);
                $rowUser = mysqli_fetch_row($resultUser);
                if (mysqli_num_rows($resultUser)>0) {
                    <?php echo '<label>Search by: </label><select name="leader">';
                            //echo '<form method="post" id = "select">';
                            foreach ($array as $key => $value) {
                            //echo '<p><input type="submit" name="submit" value="'.$value[0].'" /></p>';
                            echo '<option value="'.$value[0].'">'.$value[3].' '.$value[4].'</option>';
                            }
                            //echo '</form>';
                            $input2 = mysqli_real_escape_string($con, $_POST['input']);
                            echo '</select><label for="input">   </label><input type="submit" name= "submit" value="Submit"><input type="hidden" name="type" value="Username">';?>
                }
                else if (mysqli_num_rows($resultUser)==0){ ?>
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

