<link href="CSS/Master.css" rel="stylesheet" type="text/css" />
<link href="CSS/Menu.css" rel="stylesheet" type="text/css" />
<meta charset="utf-8">
<!-- jQuery -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- MenuMaker Plugin -->
<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>

<!-- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php 
ini_set('session.gc_maxlifetime', 7200); //sets the lower limit for how long an idle session can last at 2 hours
session_start(); 
$now = time();
if (Isset($_SESSION['discard']) && $now > $_SESSION['discard']) { //destroys a session that has sat idle for too long
	session_unset();
	session_destroy();
}
$_SESSION['discard']=$now +9000; //sets the max time that a session can be idle to two hours 30 min
?>