<?php
include "../../../config/database.php";

if (isset($_POST['username'])) {

    if(empty($_POST['password'])) {
        $currentid = $_POST['currentid'];
        header("Location: ../../index.php?useraction=update&id=$currentid&err=passempty");
    } else {
        try {
            $stmt = $conn->prepare("UPDATE user SET username=?, password=?, email=?, nama_lengkap=?, alamat=?, level=? WHERE id=?;");
            $stmt->bind_param("sssssss", $username, $password, $email, $nama_lengkap, $alamat, $level, $id);
    
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $alamat = $_POST['alamat'];
            $level = $_POST['level'];
            $id = $_POST['currentid'];
    
            $stmt->execute();
            header("Location: ../../index.php?useraction=read&pesan=updateberhasil");
        } catch (Exception $e) {
            echo "" . $e->getMessage() . "";
        }
    }

    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
