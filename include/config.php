<?php
session_start();

// Tell mysqli to throw an exception if an error occurs
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// connect to mysql database from apache server
$conn = mysqli_connect($host = "127.0.0.1:3308", $user = "root", $password = "admin", $database = "restaurant");

// exit if mysqli connection fails
if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
    exit();
}
