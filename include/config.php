<?php
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
session_start();

/* Tell mysqli to throw an exception if an error occurs */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect($host = "127.0.0.1:3308", $user = "root", $password = "admin", $database = "restaurant");

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
    exit();
}
