<?php 
session_start(); 
$_SESSION['multsearch']=array('1');
$_SESSION['nest']="hold";
$_SESSION['nstype']=NULL;
//echo $_SESSION['clear'];
$temp=$_SESSION['clear'];
//echo $temp;
header('Location: '.$temp);
?>
