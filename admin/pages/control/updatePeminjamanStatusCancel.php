<?php
include "../../../config/database.php";

if (isset($_GET['id'])) {
    try {
        $stmt = $conn->prepare("UPDATE peminjaman SET status_peminjaman=? WHERE id=?;");
        $stmt->bind_param("ss", $status, $id);

        $status = "Dipinjam";
        $id = $_GET['id'];

        $stmt->execute();
        header("Location: ../../index.php?peminjamanaction=read");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }

    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
