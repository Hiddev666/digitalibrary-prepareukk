<?php
include "../../../config/database.php";

if (isset($_POST['username'])) {
    
    $username = $_POST['username'];
    $buku_id = $_POST['id_buku'];
    $queryUsername = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM user WHERE username='$username'"))['id'];

    try {
        
        $stmt = $conn->prepare("INSERT INTO `peminjaman` (`id_user`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $usernamereal, $buku_idreal, $tgl_peminjaman, $tgl_pengembalian, $status_peminjaman);
        
        $usernamereal = $queryUsername;
        $buku_idreal = $buku_id;
        $tgl_peminjaman = $_POST['tgl_peminjaman'];
        $tgl_pengembalian = $_POST['tgl_pengembalian'];
        $status_peminjaman = "Dipinjam";

        $stmt->execute();
        header("Location: ../../index.php?peminjamanaction=read&pesan=storeberhasil");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
