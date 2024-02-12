<div class="container mt-5">
    <h1 class="m-0">Koleksi Pribadi</h1>
</div>
<div class="container d-flex w-100">
    <div class="row justify-content-center">
        <?php
        $userid = $_SESSION['user-id'];
        $getAllBook = mysqli_query($conn, "SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori inner join koleksipribadi on koleksipribadi.id_buku = buku.id WHERE koleksipribadi.id_user=$userid ORDER BY buku.id desc;");
        foreach ($getAllBook as $book) {
            include "components/card-book.php";
        } ?>
    </div>
</div>