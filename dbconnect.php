<?php

$username = "root";
$password = "";
$hostname = "localhost"; 

 $con = mysqli_connect($hostname, $username, $password,"siddhiTechTask");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 ?>
