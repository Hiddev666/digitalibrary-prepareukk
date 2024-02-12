<?php include "config/database-conf.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | DigitaLibrary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="height: 100vh;">
        <div class="content h-100" style="height: 100vh;">
            <div class="container h-100" style="height: 100vh;">
                <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-sm-6">
                        <img src="img/Key-rafiki.svg" alt="illustration">
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                        <div class="card-body">
                            <form action="login_check.php" method="POST">
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="w-75">
                                        <h2>Login.</h2>
                                    </div>
                                </div>
                                <div class="container w-75">
                                        <?php
                                        if($_GET['message'] == "fail") {
                                            echo "<div class='alert alert-danger' role='alert'>Username dan Password Tidak Sesuai!</div>";
                                        }

                                        if($_GET['message'] == "info_login") {
                                            echo "<div class='alert alert-danger' role='alert'>Maaf Anda Belum Login</div>";
                                        }

                                        if($_GET['message'] == "info_logout") {
                                            echo "<div class='alert alert-info' role='alert'>Anda Berhasil Logout</div>";
                                        }

                                        if($_GET['message'] == "info_daftar") {
                                            echo "<div class='alert alert-info' role='alert'>Anda Berhasil Daftar, Silahkan Login</div>";
                                        }
                                        ?>
                                </div>
                                <div class="form-group mt-3 d-flex justify-content-center">
                                    <div class="w-75">
                                        <label>Username</label> <br />
                                        <input type="text" name="username" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="form-group mt-2 d-flex justify-content-center">
                                    <div class="w-75">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control w-100">
                                    </div>
                                </div>
                                <div class="form-group mt-4 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75">Login</button>
                                </div>
                                <div class="form-group mt-3 w-100 d-flex justify-content-center">
                                    <label>Belum Punya Akun? <a href="register.php">Daftar</a></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>