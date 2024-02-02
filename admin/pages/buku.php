<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Buku</h3>

        <?php
        
        if(isset($_GET['pesan'])) {
            if($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan buku</div>";
            } elseif($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah buku</div>";
            } elseif($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus buku</div>";
            }
        }
        
        ?>

        <div class="mt-3">
            <a href="?bukuaction=tambah">
                <button class="btn btn-primary">Tambah Buku +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col"class="text-center">Tahun Terbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT buku.id, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori ORDER BY buku.id desc;");
                foreach ($query as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['judul']?></td>
                        <td><?= $row['penulis']?></td>
                        <td><?= $row['penerbit']?></td>
                        <td class="text-center"><?= $row['tahun_terbit']?></td>
                        <td><?= $row['nama_kategori']?></td>
                        <td>
                            <a href="?bukuaction=update&id=<?= $row['id']?>" class="btn btn-warning btn-sm">Ubah</a>
                            <a href="pages/control/deleteBuku.php?id=<?= $row['id']?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>