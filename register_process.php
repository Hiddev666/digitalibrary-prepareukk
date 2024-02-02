<?php
include "config/database.php";
if (isset($_POST["username"])) {

    try {
        $stmt = $conn->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?, 3);");
        $stmt->bind_param("sssss", $username, $password, $email, $namalengkap, $alamat);
    
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
        $email = $_POST["email"];
        $namalengkap = $_POST["namalengkap"];
        $alamat = $_POST["alamat"];
    
        $stmt->execute();
        header("Location: index.php?message=info_daftar");
    } catch (Exception $e) {
        echo "". $e->getMessage() ."";
    }
}
?>