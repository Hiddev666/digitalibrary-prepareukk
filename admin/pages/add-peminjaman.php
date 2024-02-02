<div class="container p-3 ps-4">
    <div class="container card p-4">

        <h3>Tambah Peminjaman</h3>
        <form method="POST" action="pages/control/storePeminjaman.php">
            <div class="row">
                <div class="col">
                    <label for="username" class="form-label">Username Peminjam</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="col">
                    <label for="id_buku" class="form-label">ID Buku</label>
                    <input type="text" class="form-control" id="id_buku" name="id_buku">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <label for="tgl_peminjaman" class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman">
                </div>
                <div class="col">
                    <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="storebuku">Tambah</button>
            </div>
        </form>
        <a href="index.php?peminjamanaction=read" class="mt-2">
            <button class="btn btn-warning">Cancel</button>
        </a>
    </div>
</div>