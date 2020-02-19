<!--This will allow Tellers to edit user information-->

<!doctype html>
<html>
    <head>
        <?php include("Javascript/Connections/req.php"); 
        include 'Javascript/Connections/convar.php';?>

        <title>Edit User</title>

    </head>
    <body class="EditUserPage">

    	<?php $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$con) {
			die('Could not connect: ' . mysql_error());
		} 
        $input = $_SESSION['hold'];
        $queryIn = "SELECT * FROM users WHERE username = '$input'";
        $resultIn = mysqli_query($con, $queryIn);
        $row = mysqli_fetch_row($resultIn);
        $Fname = str_replace(' ', '&nbsp;', $row[3]);
        $Lname = str_replace(' ', '&nbsp;', $row[4]);
        $Pname = str_replace(' ', '&nbsp;', $row[5]);
        //echo $_POST['submit'];
        //echo $_POST['Edit'];
        ?>
    	<div class = "container" >
            <div class = "d-flex justify-content-center" id = "EditUser">
                <div class = "row">
                    <div class = "col-xl">
                    	<legend id="AcctInfoDisp">Account Information:</legend>
                       
                        <?php 
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Edit"): 
                        ?>
                        <?php
                            if ($_POST["Edit"] == "First"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <input type="text"  name="name" value=<?php echo $Fname;?> required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="First">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">Last Name: </label>
                                        <label> <?php echo $Lname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="Last">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Ship or Household:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Fleet or Alliance:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Last"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <label><?php echo $Fname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="First">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">Last Name: </label>
                                        <input type="text" name="name" value=<?php echo $Lname;?> required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Last">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>

                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Ship or Household:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Fleet or Alliance:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>
                        <?php
                            elseif ($_POST["Edit"] == "Pirate"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 5em">First Name: </label>
                                        <label><?php echo $Fname; ?></label>
                                        <input type="submit" name="submit" value="Edit">
                                        <input type="hidden" name="Edit" value="First">
                                    </p>
                                </fieldset>
                            </form>
                            <form method="POST">
                            <fieldset>
                                <p>
                                    <label style="padding-right: 5em">Last Name: </label>
                                    <label><?php echo $Lname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Last">
                                </p>
                            </fieldset>
                        </form>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <label style="padding-right: 4.6em">Pirate Name: </label>
                                        <input type="text" name="name" value=<?php echo $Pname;?> required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Pirate">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Ship or Household:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                                </p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                                <p>
                                    <label>Fleet or Alliance:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                                </p>
                            </fieldset>
                        </form>


                        <?php
                            elseif ($_POST["Edit"] == "Ship"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <input type="text" name="name" required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Ship">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                        <?php
                            elseif ($_POST["Edit"] == "Fleet"):
                        ?>
                            <form method="POST">
                                <fieldset>
                                    <p>
                                        <input type="text" name="name" required>
                                        <input type="submit" name="submit" value="Confirm">
                                        <input type="hidden" name="delim" value="Fleet">
                                        <input type="submit" name="submit" value="Cancel" onclick="location.href='/PNPN-Website/editUser.php';">
                                    </p>
                                </fieldset>
                            </form>
                        <?php
                            endif;
                        ?>
                        <?php 
                            elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit'] == "Confirm"):
                                if ($_POST['delim']=="First") {
                                    $name=$_POST['name'];
                                    $update = "UPDATE users SET Fname = '$name' WHERE users.Username = '$input'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }
                                else if ($_POST['delim']=="Last") {
                                    $name=$_POST['name'];
                                    $update = "UPDATE users SET Lname = '$name' WHERE users.Username = '$input'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }
                                else if ($_POST['delim']=="Pirate") {
                                    $name=$_POST['name'];
                                    $update = "UPDATE users SET Pname = '$name' WHERE users.Username = '$input'";
                                    $temp=mysqli_query($con, $update);
                                    header("Location: /PNPN-Website/editUser.php");
                                }

                        ?>
                        <?php 
                            else: 
                        ?>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 5em">First Name: </label>
                                    <label><?php echo $Fname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="First">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 5em">Last Name: </label>
                                    <label><?php echo $Lname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Last">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label style="padding-right: 4.6em">Pirate Name: </label>
                                    <label><?php echo $Pname; ?></label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Pirate">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label>Ship or Household:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Ship">
                            	</p>
                            </fieldset>
                        </form>
                        <form method="POST">
                            <fieldset>
                            	<p>
                            		<label>Fleet or Alliance:</label>
                                    <input type="submit" name="submit" value="Edit">
                                    <input type="hidden" name="Edit" value="Fleet">
                            	</p>
                            </fieldset>
                        </form>
                        <?php
                            endif;
                        ?>
                        <div class="col">
                        <a href="/PNPN-Website/teller.php" style="text-decoration: none; color: black; align-content: center">Back to Teller Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

