<?php

// $timezone = date_default_timezone_set("America/Toronto");

$conn = mysqli_connect($host = "127.0.0.1:3308", $user = "root", $password = "admin", $database = "restaurant");

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
    exit();
}
