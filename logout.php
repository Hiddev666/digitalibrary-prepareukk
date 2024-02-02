<?php
session_start();
session_destroy();
header("Location: index.php?message=info_logout");
?>