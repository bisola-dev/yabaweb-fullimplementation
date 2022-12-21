<?php

$servername="localhost";
  $username="root";
  $password="";
  $dbname="yabaweb";

// establishing connection with the server by passing servername, username, password and database name as the peremeters
  $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
