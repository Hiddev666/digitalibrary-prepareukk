<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="height: 100vh;">
        <div class="content h-100" style="height: 100vh;">
            <div class="container h-100" style="height: 100vh;">
                <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-sm-6">
                        <img src="img/12445722_4970533.svg" alt="illustration">
                    </div>
                    <div class="col-sm-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                        <div class="card-body">
                            <form action="register_process.php" method="POST">
                                <div class="w-100 d-flex justify-content-center">
                                    <div class="w-75">
                                        <h2>Register.</h2>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Username</label> <br />
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="namalengkap" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="w-100 d-flex justify-content-center">
                                        <div class="w-75">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4 w-100 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75">Register</button>
                                </div>
                                <div class="form-group mt-3 d-flex justify-content-center">
                                    <label>Sudah Punya Akun? <a href="index.php">Login</a></label>
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