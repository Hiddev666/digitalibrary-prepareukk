<?php
include "../../../config/database.php";

try {

    $stmt = $conn->prepare("DELETE FROM kategoribuku_relasi WHERE id_buku=?;");
    $stmt->bind_param("s", $id);

    $id = $_GET['id'];

    $stmt->execute();

    try {
        $stmt = $conn->prepare("DELETE FROM buku WHERE id=?;");
        $stmt->bind_param("s", $id);

        $id = $_GET['id'];

        $stmt->execute();

        header("Location: ../../index.php?bukuaction=read&pesan=deleteberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
} catch (Exception $e) {
    echo "" . $e->getMessage() . "";
}
