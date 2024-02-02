<?php
include "../../../config/database.php";

if (isset($_POST['judul'])) {

    try {
        $stmt = $conn->prepare("INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, ?, ?, ?, ?);");
        $stmt->bind_param("ssss", $judul, $penulis, $penerbit, $tahunterbit);

        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahunterbit = $_POST['tahunterbit'];

        $stmt->execute();
        $getLastBookQuery = mysqli_query($conn, "SELECT id FROM buku ORDER BY id DESC LIMIT 1;");
        $lastBookArr = mysqli_fetch_array($getLastBookQuery);

        try {
            $relation = $conn->prepare("INSERT INTO kategoribuku_relasi VALUES (NULL, ?, ?);");
            $relation->bind_param("ss", $buku, $kategori);

            $buku = $lastBookArr['id'];
            $kategori = $_POST['kategori'];

            $relation->execute();
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }

        header("Location: ../../index.php?bukuaction=read&pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
