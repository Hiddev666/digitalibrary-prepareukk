<?php
include "../../../config/database.php";

if (isset($_POST['namakategori'])) {

    try {
        $stmt = $conn->prepare("UPDATE kategoribuku SET nama_kategori=? WHERE id=?;");
        $stmt->bind_param("ss", $nama, $id);

        $nama = $_POST['namakategori'];
        $id = $_POST['currentid'];

        $stmt->execute();
        header("Location: ../../index.php?kategoriaction=read&pesan=updateberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
