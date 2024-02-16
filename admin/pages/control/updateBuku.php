<?php
include "../../../config/database.php";

if ($_FILES['image']['name'] != "") {
    $targetDirectory = "/opt/lampp/htdocs/digitalibrary/img/uploaded/";
    $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
    $maxFileSize = 500000;
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $stmt = $conn->prepare("UPDATE buku SET image=?, judul=?, penulis=?, penerbit=?, tahun_terbit=? WHERE id=?;");
        $stmt->bind_param("ssssss", $image, $judul, $penulis, $penerbit, $tahunterbit, $id);

        $image = $_SERVER["SERVER_NAME"] . "/digitalibrary/img/uploaded/" . $_FILES["image"]["name"];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahunterbit = $_POST['tahunterbit'];
        $id = $_POST['currentid'];

        $stmt->execute();
        header("Location: ../../index.php?bukuaction=read&pesan=storeberhasil");
    } else {
        echo "gagal";
    }
} else {
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
}
