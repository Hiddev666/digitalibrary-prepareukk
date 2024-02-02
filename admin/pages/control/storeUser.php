<?php
include "../../../config/database.php";

if (isset($_POST['username'])) {
    try {
        $stmt = $conn->prepare("INSERT INTO `user` (`username`, `password`, `email`, `nama_lengkap`, `alamat`, `level`) VALUES (?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("ssssss", $username, $password, $email, $namalengkap, $alamat, $level);

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['email'];
        $namalengkap = $_POST['nama_lengkap'];
        $alamat = $_POST['alamat'];
        $level = $_POST['level'];

        $stmt->execute();
        header("Location: ../../index.php?useraction=read&pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
