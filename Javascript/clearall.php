<?php 
session_start(); 
$_SESSION['hold']="hold";
$_SESSION['temp']="temp";
$_SESSION['multsearch']=array('1');
$_SESSION['stype']=NULL;
$_SESSION['nest']="hold";
$_SESSION['nstype']=NULL;
//echo $_SESSION['clear'];
$temp=$_SESSION['clear'];
//echo $temp;
header('Location: '.$temp);
?>
