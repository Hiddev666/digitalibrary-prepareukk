<?php

$env = parse_ini_file("../.env");

$server = $env['DB_SERVER'];
$username = $env['DB_USERNAME'];
$password = $env['DB_PASSWORD'];
$db = $env['DB_NAME'];

try {
    $conn = mysqli_connect($server, $username, $password, $db);
} catch (Exception $e) {
    echo "Database Connection Error!";
    die();
}
