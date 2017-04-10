<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ticket_exchange";

// set timezone
date_default_timezone_set("America/Los_Angeles");

// create connection
$conn = mysqli_connect($servername, $username, $password);

// check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

// set database
mysqli_select_db($conn, $database);
?>
