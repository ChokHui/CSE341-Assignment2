<?php
$dbhost = "localhost";
$username = "root";
$password = "";
$db = "report_db";

// Create connection
$connect = mysqli_connect($dbhost, $username, $password,$db);

// Check connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

?>