<?php

$userid =  $_SESSION['user-id'];

    $userid = $_SESSION['user-id'];

    try {
        $stmt = $conn->prepare("INSERT INTO `peminjaman` (`id_user`, `id_buku`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $userId, $buku_idreal, $tgl_peminjaman, $tgl_pengembalian, $status_peminjaman);
        
        $userId = $userid;
        $buku_idreal = $bookid;
        $tgl_peminjaman = date("Y-m-d");
        $tgl_pengembalian = date("Y-m-d", strtotime("+3 days"));
        $status_peminjaman = "Dipinjam";

        $stmt->execute();
        header("Location: index.php?page=allcatalog");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }

?>