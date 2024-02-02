<?php
include "../../../config/database.php";

if (isset($_POST['tgl_peminjaman'])) {
    $username = $_POST['username'];
    $usernameQuery = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM user WHERE username='$username'"))['id'];
    try {
        $stmt = $conn->prepare("UPDATE peminjaman SET id_user=?, id_buku=?, tgl_peminjaman=?, tgl_pengembalian=? WHERE id=?;");
        $stmt->bind_param("sssss", $username, $id_buku, $tgl_peminjaman, $tgl_pengembalian, $id);

        $username = $usernameQuery;
        $id_buku = $_POST['id_buku'];
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $tgl_pengembalian = $_POST['tgl_pengembalian'];
        $id = $_POST['currentid'];

        $stmt->execute();
        header("Location: ../../index.php?peminjamanaction=read&pesan=updateberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }

    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
