<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Kategori</h3>

        <?php
        
        if(isset($_GET['pesan'])) {
            if($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan kategori</div>";
            } elseif($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah kategori</div>";
            } elseif($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus kategori</div>";
            }
        }
        
        ?>

        <div class="mt-3">
            <a href="?kategoriaction=tambah">
                <button class="btn btn-primary">Tambah Kategori +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM kategoribuku order by id desc;");
                foreach ($query as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['nama_kategori']?></td>
                        <td>
                            <a href="?kategoriaction=update&id=<?= $row['id']?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="pages/control/deleteKategori.php?id=<?= $row['id']?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>