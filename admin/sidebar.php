<div class="w-25 position-fixed h-100 shadow-sm" style="background-color: white;">
    <div class="container p-3 ps-4 mt-3 d-flex align-items-center">
        <img src="../img/book.svg" alt="" width="40px">
        <h5 class="m-0 ms-2">DigitaLibrary</h5>
    </div>
    <div class="container p-4">
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if(isset($_GET['bukuaction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?bukuaction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Buku</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if(isset($_GET['kategoriaction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?kategoriaction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Kategori</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if(isset($_GET['peminjamanaction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?peminjamanaction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">Peminjaman</p>
            </a>
        </div>
        <div class="container p-3 mb-1 d-flex align-items-center rounded <?php
            if(isset($_GET['useraction'])) {
                echo "bg-warning";
            }
        ?>">
            <a href="index.php?useraction=read" class="link-offset-2 link-underline link-underline-opacity-0 link-dark">
                <p class="m-0">User</p>
            </a>
        </div>
        <div class="container position-absolute bottom-0 w-75 d-flex align-items-center" style="height: 15vh;">
        <div class="container p-3 mb-1 d-flex align-items-center rounded">
            <a href="../logout.php" class="link-offset-2 link-underline link-underline-opacity-0 d-flex align-items-center link-dark w-100 justify-space-between">
                <h6 class="m-0">@<?= $_SESSION['username']?></h6>
                <p class="ms-1 btn btn-warning btn-sm m-0">Logout</p>
            </a>
        </div>
        </div>
    </div>
</div>