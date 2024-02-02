<?php
include "config/database.php";

if (isset($_POST["username"])) {
    session_start();

    try {
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' and password='$password'");
        $queryArr = mysqli_fetch_array($query);
        if (mysqli_num_rows($query) != 0) {
            $_SESSION['username'] = $queryArr['username'];

            if ($queryArr['level'] == "3") {
                $_SESSION['level'] = $queryArr['level'];
                header("Location: peminjam/");
            }

            if ($queryArr["level"] == "2") {
                $_SESSION['level'] = $queryArr['level'];
                header("Location: petugas/");
            }

            if ($queryArr["level"] == "1") {
                $_SESSION['level'] = $queryArr['level'];
                header("Location: admin/index.php?bukuaction=read");
            }
        } else {
            header("Location: index.php?message=fail");
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

}

?>