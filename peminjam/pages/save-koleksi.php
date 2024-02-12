<?php

$userid = $_SESSION['user-id'];

$query = mysqli_query($conn, "SELECT * FROM koleksipribadi WHERE id_user=$userid AND id_buku=$bookid;");

if (mysqli_num_rows($query) != 0) {
    try {
        $stmt = $conn->prepare("DELETE FROM `koleksipribadi` WHERE id_user=? AND id_buku=?;");
        $stmt->bind_param("ss", $userId, $buku_idreal);

        $userId = $userid;
        $buku_idreal = $bookid;

        $stmt->execute();
        header("Location: index.php?page=allcatalog");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
} else {
    try {
        $stmt = $conn->prepare("INSERT INTO `koleksipribadi` (`id_user`, `id_buku`) VALUES (?, ?);");
        $stmt->bind_param("ss", $userId, $buku_idreal);

        $userId = $userid;
        $buku_idreal = $bookid;

        $stmt->execute();
        header("Location: index.php?page=allcatalog");
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
}
