<?php

$id = $_GET['id'];
$kategoriQuery = mysqli_query($conn, "SELECT * FROM kategoribuku WHERE id='$id';");
$kategoriQueryArr = mysqli_fetch_array($kategoriQuery);
?>

<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Ubah Kategori</h3>
        <form method="POST" action="pages/control/updateKategori.php">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?= $kategoriQueryArr['nama_kategori']?>">
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="currentid" value="<?= $id?>">Ubah</button>
            </div>
        </form>
        <a href="index.php?kategoriaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>