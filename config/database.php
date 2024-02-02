<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "digitalibrary";

try {
    $conn = mysqli_connect($server, $username, $password, $db);
} catch (Exception $e) {
    echo "Database Connection Error!";
    die();
}
?>