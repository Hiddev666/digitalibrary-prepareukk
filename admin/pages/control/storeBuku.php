<?php
include "../../../config/database.php";

if (isset($_POST['judul'])) {

    try {

        $targetDirectory = "/opt/lampp/htdocs/digitalibrary/img/uploaded/";
        $allowedFileTypes = array("jpg", "jpeg", "png", "gif");
        $maxFileSize = 500000;

        if (isset($_FILES['image'])) {
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $stmt = $conn->prepare("INSERT INTO `buku` (`id`, `image`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, ?, ?, ?, ?, ?);");
                $stmt->bind_param("sssss", $image, $judul, $penulis, $penerbit, $tahunterbit);

                $image = $_SERVER["SERVER_NAME"] . "/digitalibrary/img/uploaded/" . $_FILES["image"]["name"];
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
            } else {
                echo "gagal";
            }
        }
    } catch (Exception $e) {
        echo "" . $e->getMessage() . "";
    }
    // $storeBookQuery = mysqli_query($conn, "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahunterbit');");

    // die();
    // $storeRelationQuery = mysqli_query($conn, "INSERT INTO kategoribuku_relasi VALUES ('', )");
}
