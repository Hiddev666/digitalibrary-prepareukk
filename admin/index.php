<?php
session_start();

if (!isset($_SESSION["level"])) {
    header("Location: index.php?message=info_login");
}
?>
<?php include "../config/database.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | DigitaLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #F8F9FD;">

    <!-- <?php
            include "sidebar.php";
            ?> -->

    <div class="d-flex w-100">
        <div class="w-25 bg-danger">
            <?php include "sidebar.php" ?>
        </div>


        <div class="w-75">
            <?php
            if (isset($_GET['bukuaction'])) {

                if ($_GET['bukuaction'] == "tambah") { ?>
                    <?php include "pages/add-buku.php" ?>
                <?php } elseif ($_GET['bukuaction'] == "read") { ?>
                    <?php include "pages/buku.php" ?>
                <?php } elseif ($_GET['bukuaction'] == "update") { ?>
                    <?php include "pages/update-buku.php" ?>
                <?php } ?>

                <?php } elseif (isset($_GET['kategoriaction'])) {

                if ($_GET['kategoriaction'] == "tambah") { ?>
                    <?php include "pages/add-kategori.php" ?>
                <?php } elseif ($_GET['kategoriaction'] == "read") { ?>
                    <?php include "pages/kategori.php" ?>
                <?php } elseif ($_GET['kategoriaction'] == "update") { ?>
                    <?php include "pages/update-kategori.php" ?>
                <?php } ?>

                <?php } elseif (isset($_GET['peminjamanaction'])) {

                if ($_GET['peminjamanaction'] == "tambah") { ?>
                    <?php include "pages/add-peminjaman.php" ?>
                <?php } elseif ($_GET['peminjamanaction'] == "read") { ?>
                    <?php include "pages/peminjaman.php" ?>
                <?php } elseif ($_GET['peminjamanaction'] == "update") { ?>
                    <?php include "pages/update-peminjaman.php" ?>
                <?php } ?>

                <?php } elseif (isset($_GET['useraction'])) {

                if ($_GET['useraction'] == "tambah") { ?>
                    <?php include "pages/add-user.php" ?>
                <?php } elseif ($_GET['useraction'] == "read") { ?>
                    <?php include "pages/user.php" ?>
                <?php } elseif ($_GET['useraction'] == "update") { ?>
                    <?php include "pages/update-user.php" ?>
                <?php } ?>

            <?php } else { ?>
                <?php include "pages/buku.php" ?>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>