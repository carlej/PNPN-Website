 <link href="CSS/Master.css" rel="stylesheet" type="text/css" />
 
<meta charset="utf-8">
<!-- jQuery -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- MenuMaker Plugin -->
<script src="https://s3.amazonaws.com/menumaker/menumaker.min.js"></script>

<!-- Icon Library -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<?php 
ini_set('session.gc_maxlifetime', 1200); //sets the lower limit for how long an idle session can last at 2 hours
session_start(); 
$now = time();
if (Isset($_SESSION['discard']) && $now > $_SESSION['discard']) { //destroys a session that has sat idle for too long
	session_unset();
	session_destroy();
}
$_SESSION['discard']=$now +1800; //sets the max time that a session can be idle to two hours 30 min
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1", user-scalable=no>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js">