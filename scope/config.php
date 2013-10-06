<?php
$db = 'scope';
$user = 'root';
$pass = 'aiaabowali';
$host = 'localhost';

$con = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
