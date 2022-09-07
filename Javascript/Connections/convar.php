<?php
  // Define database connection constants
$testing = true;
//$testing = false;
if ($testing) {
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'Pinda4656');
  define('DB_NAME', 'PNPN-Website');
  define('CON_STRING', 'mysql:host=localhost;dname=root');
}
else {
  define('DB_NAME', 'ebdb');
  define('DB_HOST', 'awseb-e-q3y3kf3u7n-stack-awsebrdsdatabase-n2jgt0veax90.csopopgczu5f.us-west-2.rds.amazonaws.com');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'Pinda4656');
  define('CON_STRING', 'mysql:host=awseb-e-q3y3kf3u7n-stack-awsebrdsdatabase-n2jgt0veax90.csopopgczu5f.us-west-2.rds.amazonaws.com;dname=root');
}
?>
