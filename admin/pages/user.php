<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>User</h3>

        <?php
        
        if(isset($_GET['pesan'])) {
            if($_GET['pesan'] == 'storeberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menambahkan user</div>";
            } elseif($_GET['pesan'] == 'updateberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil mengubah user</div>";
            } elseif($_GET['pesan'] == 'deleteberhasil') {
                echo "<div class='alert alert-info' role='alert'>Berhasil menghapus user</div>";
            }
        }
        
        ?>

        <div class="mt-3">
            <a href="?useraction=tambah">
                <button class="btn btn-primary">Tambah User +</button>
            </a>
        </div>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM user order by id desc;");
                foreach ($query as $row) {
                ?>
                    <tr>
                        <th scope="row"><?= $row['id'] ?></th>
                        <td><?= $row['nama_lengkap']?></td>
                        <td><?= $row['email']?></td>
                        <td><?php
                            if($row['level'] == "1") {
                                echo "Admin";
                            } elseif($row['level'] == "2") {
                                echo "Petugas";
                            } elseif($row['level'] == "3") {
                                echo "Anggota";
                            }
                        ?></td>
                        <td>
                            <a href="?useraction=update&id=<?= $row['id']?>" class="btn btn-warning btn-sm">Detail</a>
                            <a href="pages/control/deleteUser.php?id=<?= $row['id']?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>