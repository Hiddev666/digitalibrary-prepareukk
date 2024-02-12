<?php
$getDetailBook = mysqli_fetch_array(mysqli_query($conn, "SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori WHERE buku.id = $id ORDER BY buku.id desc;"));
?>

<div class="container mt-5 d-flex">
    <img src="http://<?= $getDetailBook['image'] ?>" alt="" style="height: 70vh;" class="rounded border border-1">
    <div class="ms-5 " style="width: 30%;">
        <h1><?= $getDetailBook['judul'] ?></h1>
        <div class="mt-3">
            <div class="row w-100">
                <div class="col">
                    <p class="m-0">Penulis</p>
                    <h5 class="m-0"><?= $getDetailBook['penulis'] ?></h5>
                </div>
                <div class="col">
                    <p class="m-0 mt-3">Penerbit</p>
                    <h5 class="m-0"><?= $getDetailBook['penerbit'] ?></h5>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <p class="m-0 mt-3">Tahun Terbit</p>
                    <h5 class="m-0"><?= $getDetailBook['tahun_terbit'] ?></h5>
                </div>
                <div class="col">
                    <p class="m-0 mt-3">Kategori</p>
                    <h5 class="m-0"><?= $getDetailBook['nama_kategori'] ?></h5>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex gap-3">
            <a href="?page=allcatalog" class="btn btn-warning">Cancel</a>
            <a href="?page=pinjam" class="btn btn-primary">Pinjam Sekarang</a>
        </div>
    </div>
    <div class="container w-25 ms-5">
        <div class="mt-2">
            <h6>Tambahkan Rating</h6>
            <form action="pages/storeRating.php" method="POST">
                <input type="hidden" name="id" id="" value="<?= $_GET['id'] ?>">
                <input type="number" class="form-control" name="rating">
        </div>
        <div class="mt-2">
            <h6>Tambahkan Ulasan</h6>
            <textarea name="ulasan" id="" cols="30" rows="10" class="form-control">

                </textarea>
        </div>
        <div class="mt-2">
            <input type="submit" name="" id="" class="btn btn-warning" value="Kirim">
        </div>
        </form>

        <div class="mt-5 d-flex flex-column gap-3 mb-5">
            <?php
            $userid = $_SESSION['user-id'];
            $getUlasan = mysqli_query($conn, "SELECT * FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=$id;");
            foreach ($getUlasan as $ulasan) {
            ?>
                <div class="card p-2">
                    <div class="d-flex justify-content-between">
                            <h6 class="m-0"><?= $ulasan['nama_lengkap']?></h6>
                            <div class="d-flex align-items-center">
                                <img src="../img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                                <p class="m-0 ms-1"><?= $ulasan['rating']?></p>
                            </div>
                        </div>
                    <p class="m-0 mt-2"><?= $ulasan['ulasan']?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

</div>