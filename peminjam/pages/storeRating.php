<?php
include "../../config/database.php"; 
session_start();
$userid = $_SESSION['user-id'];

$id = $_POST['id'];

try {
    $stmt = $conn->prepare("INSERT INTO `ulasanbuku` (`id_user`, `id_buku`, `ulasan`, `rating`) VALUES (?, ?, ?, ?);");
    $stmt->bind_param("ssss", $userId, $buku_idreal, $ulasan, $rating);

    $userId = $userid;
    $buku_idreal = $_POST['id'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $stmt->execute();
    header("Location: ../index.php?page=detail&id=$id");
} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
