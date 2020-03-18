<?php //this is the password recovery file?>

<!DOCTYPE html>
<html>
	<head>
		<?php include("Javascript/Connections/req.php"); ?>

		<title>Password Recovery</title>
	</head>
	<body class = "LoginPage">
		
		<div class ="container">
			<div class = "d-flex justify-content-center">
				<div style="font-family: pirates; font-size: 1.5em"; id = "WelcomeMessage">Welcome</div>
			</div>
		</div>
			
			
		<?php 
		include 'Javascript/Connections/convar.php'; 
		
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Escape user inputs for security
		$Username = $_POST['Username'];
		$answer = NULL;

		$queryIn = "SELECT * FROM users where Username='$Username' ";
		$resultIn = mysqli_query($con, $queryIn);
		if (mysqli_num_rows($resultIn)==0){
			echo '<div class="container" id = "NoneFound">
							There are no accounts with that Email!
					</div>';
			//echo '<script type="text/javascript">alert("That email does not exist.");</script>';
            //$msg = "<h2>Can't Add to Table</h2> That email does not exist. $Username<p>";
		}
		if (mysqli_num_rows($resultIn)!=0) {
			$row2 = mysqli_fetch_row($resultIn);
			$question = $row2[17];
			$ackAnswer = $row2[18];
			$salt = $row2[2];
			if (!$_POST['answer']) {
				echo "<div class ='container'><div class = 'd-flex justify-content-center' id = 'LoginWindow' ><div class = 'row'><div class = 'col-12'><p><form method='post' id='addForm'><label>";
				switch ($question) {
					case '0':
						echo "What is the name of your first pet?";
						break;
					case '1':
						echo "What is the name of your favorite book?";
						break;
					case '2':
						echo "What is the name of your favorite teacher in school?";
						break;
					case '3':
						echo "Where was your first full time job?";
						break;
					case '4':
						echo "What is the name of your third-grade teacher?";
						break;
					case '5':
						echo "Where were you when you had your first alcoholic drink(or cigarette, joint etc.)?";
						break;
					default:
						echo "How did you even get here?";
						break;
				}
				echo "</label></p><p><label for='Answer' style='font-family: pirates'>Answer:</label><input type='text' name='answer' id='answer' style='width: 12em;' required></p><p><input type = 'submit'  value = 'Submit' style='font-family: pirates'/></p><input type='hidden' name='Username' value = '".$Username."'></form><a href='login.php' style='color:black; text-decoration: none;'>Back to Login</a></div></div></div></div>";
			}
			else if ($_POST['answer']) {
				$answerTemp = $_POST['answer'];
				$answer = md5($salt.$answerTemp);
				if ($answer==$ackAnswer) {
					?>
					<div class ="container">
						<div class = "d-flex justify-content-center" id = "LoginWindow" >
							<div class = "row">
								<div class = "col-12">
									<form method="post" id="addForm">
										<p>
			                                <label for="Password" style="font-family: pirates;">Password:</label>
			                                <input id="password" name="password" type="password" minlength="6" required>
			                            </p>
			                            <p>
			                                <label for="ConfirmPassword" style="font-family: pirates">Confirm Password:</label>
			                                <input id="password_two" name="password_two" type="password" minlength="6" required>
			                            </p>
			                            <p>
						        			<input type = "submit"  value = "Submit" style="font-family: pirates"/>
						        			<input type = "reset"  value = "Clear" style="font-family: pirates" />
						        			<input type = "hidden" name="answer">
						    			</p>
			                        </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>

					<?php
					//header("Location: login.php");
				}
				else{
					//echo $Username;
					//echo $Password;
					echo '<div class="container-flow" id="LoginE">
							<div class = "d-flex justify-content-center">
							<div class = "row" >
							<div class = "col-12">Incorrect Answer</div>
							</div>
							</div>
						 </div>';
				}
			}
			}
	}
	else {
	
	?>

	<div class ="container">
		<div class = "d-flex justify-content-center" id = "LoginWindow" >
			<div class = "row">
			<div class = "col-12">
			<form method="post" id="addForm">
    			<p>
        			<label for="Username" style="font-family: pirates">Email:</label>
					<input type="text" class="required" name="Username" id="Username" style="width: 15em;">
				</p>
				<p>
        			<input type = "submit"  value = "Submit" style="font-family: pirates"/>
        			<input type = "reset"  value = "Clear" style="font-family: pirates" />
        			<input type = "hidden" name="answer">
    			</p>
			</form>
			</div>
			</div>
		</div>
	</div>
<?php } mysqli_close($con); ?>
	
	</body>
</html>
