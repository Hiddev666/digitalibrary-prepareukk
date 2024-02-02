<?php
include "../../../config/database.php";

try {

    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id=?;");
    $stmt->bind_param("s", $id);

    $id = $_GET['id'];

    $stmt->execute();
    header("Location: ../../index.php?peminjamanaction=read&pesan=deleteberhasil");
} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
