<?php //this validates a new user to make sure they they can be created.
include 'Connections/convar.php';
$Username=$_POST['Username'];
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
$queryIn = "SELECT * FROM users where Username='$Username' ";
$resultIn = mysqli_query($con, $queryIn);
if (mysqli_num_rows($resultIn)>0) {
//        echo "There is already a user with that user name";
//       	echo '<script type="text/javascript">alert("There is already a user with that user name please enter again");</script>';
	echo json_encode(array("0"=>false,"1"=>"There is already a user with that user name please enter again"));
}
else{
	echo json_encode(array("0"=>true,"1"=>""));
}

?>