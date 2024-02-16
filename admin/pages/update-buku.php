<?php

$id = $_GET['id'];
$bookQuery = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id';");
$bookQueryArr = mysqli_fetch_array($bookQuery);
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Buku</h3>
        <form method="POST" action="pages/control/updateBuku.php" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= $bookQueryArr['judul'] ?>">
                </div>
                <div class="col">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $bookQueryArr['penulis'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $bookQueryArr['penerbit'] ?>">
                </div>
                <div class="col">
                    <label for="tahunterbit" class="form-label">Tahun Terbit</label>
                    <input type="text" class="form-control" id="tahunterbit" name="tahunterbit" value="<?= $bookQueryArr['tahun_terbit'] ?>">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="penerbit" class="form-label">Kategori</label>
                    <select name="kategori" id="" class="form-select">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM kategoribuku;");

                        $kategoriQuery = mysqli_query($conn, "SELECT * FROM kategoribuku_relasi inner join kategoribuku on kategoribuku_relasi.id_kategori = kategoribuku.id  WHERE kategoribuku_relasi.id_buku='$id';");
                        $kategoriQueryArr = mysqli_fetch_array($kategoriQuery);
                        ?>
                        <option value="<?= $kategoriQueryArr['id'] ?>"><?= $kategoriQueryArr['nama_kategori'] ?></option>
                        <?php foreach ($query as $kategori) { ?>
                            <option value="<?= $kategori['id'] ?>"><?= $kategori['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col d-flex align-items-center gap-2">
                    <div class="card w-25">
                        <img src="http://<?= $bookQueryArr['image'] ?>" alt="" class="card-img-top">
                    </div>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $id ?>">Ubah</button>
            </div>
        </form>
        <a href="index.php?bukuaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>