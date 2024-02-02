<?php
include "../../../config/database.php";

if (isset($_POST['namakategori'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO `kategoribuku` (`id`, `nama_kategori`) VALUES (NULL, ?);");
        $stmt->bind_param("s", $namakategori);

        $namakategori = $_POST['namakategori'];

        $stmt->execute();
        header("Location: ../../index.php?kategoriaction=read&pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
