<?php
session_start();

if(!isset($_SESSION["level"])){
    header("Location: index.php?message=info_login");
}
?>
<p>Halo <?= $_SESSION['username']?> Anda login sebagai <?= $_SESSION['level']?></p>
<a href="../logout.php">LOGOUT</a>