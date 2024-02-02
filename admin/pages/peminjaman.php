<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Peminjaman</h3>

        <?php

        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan peminjaman</div>";
            } elseif ($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah peminjaman</div>";
            } elseif ($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus peminjaman</div>";
            }
        }

        ?>


        <div class="mt-3">
            <a href="?peminjamanaction=tambah">
                <button class="btn btn-primary">Tambah Peminjaman +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Buku</th>
                    <th scope="col">Peminjaman</th>
                    <th scope="col">Pengembalian</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT peminjaman.id, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user ORDER BY peminjaman.id DESC;");
                foreach ($query as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['nama_lengkap'] ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tgl_peminjaman'] ?></td>
                        <td><?= $row['tgl_pengembalian'] ?></td>
                        <td>
                            <p class="m-0 text-center p-1 rounded <?php
                                                                    if ($row['status_peminjaman'] == "Dipinjam") {
                                                                        echo "bg-warning text-light";
                                                                    } else {
                                                                        echo "bg-success text-light";
                                                                    }
                                                                    ?>">
                                <?= $row['status_peminjaman'] ?>
                            </p>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="pages/laporan.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Laporan</a>
                                <a href="?peminjamanaction=update&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="pages/control/deletePeminjaman.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>

                                <?php
                                if ($row['status_peminjaman'] == "Dipinjam") { ?>
                                    <a href="pages/control/updatePeminjamanStatusOK.php?id=<?= $row['id'] ?>">
                                        <img src="../img/accept-check-good-mark-ok-tick-svgrepo-com.svg" alt="" style="width: 28px;">
                                    </a>
                                <?php } else { ?>
                                    <a href="pages/control/updatePeminjamanStatusCancel.php?id=<?= $row['id'] ?>">
                                        <img src="../img/cross-mark-svgrepo-com.svg" alt="" style="width: 20px;">
                                    </a>
                                <?php } ?>


                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>