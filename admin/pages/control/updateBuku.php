<?php
include "../../../config/database.php";

if (isset($_POST['judul'])) {

    try {
        $stmt = $conn->prepare("UPDATE buku SET judul=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id=?;");
        $stmt->bind_param("sssss", $judul, $penulis, $penerbit, $tahunterbit, $id);

        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahunterbit = $_POST['tahunterbit'];
        $id = $_POST['currentid'];

        $stmt->execute();
        $getLastBookQuery = mysqli_query($conn, "SELECT id FROM buku ORDER BY id DESC LIMIT 1;");
        $lastBookArr = mysqli_fetch_array($getLastBookQuery);

        try {
            $relation = $conn->prepare("UPDATE kategoribuku_relasi SET id_buku=?, id_kategori=? WHERE id_buku=?");
            $relation->bind_param("sss", $idbuku, $kategori, $idbuku);

            $idbuku = $id;
            $kategori = $_POST['kategori'];

            $relation->execute();
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }

        header("Location: ../../index.php?bukuaction=read&pesan=updateberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
