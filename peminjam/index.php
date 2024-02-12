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

<body>

    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid p-2">
            <a href="index.php?page=allcatalog" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                <div class="ms-4 d-flex align-items-center">
                    <img src="../img/book.svg" alt="" width="40px">
                    <h5 class="m-0 ms-2">DigitaLibrary</h5>
                </div>
            </a>
            <div class="d-flex gap-3  me-4">
                <form class="d-flex" role="search" method="GET" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-warning" type="submit">Search</button>
                </form>
                <a href="?page=dipinjam">
                    <img src="../img/book-saved-svgrepo-com.svg" alt="" style="width: 35px;">
                </a>
                <a href="?page=koleksipribadi">
                    <img src="../img/collection-tag-svgrepo-com.svg" alt="" style="width: 35px;">
                </a>
                <div class="btn-group ms-3 d-flex align-items-center">
                    <a type="button" class="dropdown-toggle link-offset-2 link-underline link-underline-opacity-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        @<?= $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="../logout.php" class="dropdown-item" type="button">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <?php

    if (isset($_GET['search'])) {
        include "pages/search.php";
    }

    if (isset($_GET['page'])) {
        if ($_GET['page'] == "allcatalog") {
            include "pages/all-catalog.php";
        } elseif ($_GET['page'] == "detail") {
            $id = $_GET['id'];
            include "pages/detail.php";
        } elseif ($_GET['page'] == "pinjam") {
            $bookid = $_GET['bookid'];
            include "pages/pinjam.php";
        } elseif ($_GET['page'] == "dipinjam") {
            $bookid = $_GET['bookid'];
            include "pages/dipinjam.php";
        } elseif ($_GET['page'] == "savekoleksi") {
            $bookid = $_GET['bookid'];
            include "pages/save-koleksi.php";
        } elseif ($_GET['page'] == "koleksipribadi") {
            $bookid = $_GET['bookid'];
            include "pages/koleksipribadi.php";
        }
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>