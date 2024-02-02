<?php
session_start();

if (!isset($_SESSION["level"])) {
    header("Location: index.php?message=info_login");
}
?>
<?php include "config/database-conf.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | DigitaLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="content mt-3">
            <div class="card bg-success bg-gradient">
                <div class="card-body">
                    <a href="" class="btn text-light">Dashboard</a>
                    <a href="" class="btn text-light">Kategori Buku</a>
                    <a href="" class="btn  text-light">Buku</a>
                    <a href="" class="btn text-light">Users</a>
                    <a href="" class="btn text-light">Peminjaman</a>
                    <a href="" class="btn text-light">Laporan Peminjaman</a>
                    <a href="../logout.php" class="btn text-light">Logout</a>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card d-flex">
                        <div class="card-body bg-warning text-center">
                            <h3>Data Buku</h3>
                            <h2>3</h2>
                            <hr>
                            <a href="buku-table.php" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card d-flex">
                        <div class="card-body bg-danger text-center">
                            <h3>Kategori Buku</h3>
                            <h2>3</h2>
                            <hr>
                            <a href="" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card d-flex">
                        <div class="card-body bg-info text-center">
                            <h3>Users</h3>
                            <h2>3</h2>
                            <hr>
                            <a href="" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card d-flex">
                        <div class="card-body bg-primary text-center">
                            <h3>Peminjaman</h3>
                            <h2>3</h2>
                            <hr>
                            <a href="" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="card">
                <div class="card-body">
                    <p>Halo <?= $_SESSION['username'] ?> Anda login sebagai <?= $_SESSION['level'] ?></p>
                </div>
            </div>
        </div>
        <div class="content mt-3 text-center">
            <p>Copyright 2024 HIDDEV.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>