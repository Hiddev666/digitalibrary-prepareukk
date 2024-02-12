<div class="container d-flex w-100 justify-content-center">
        <div class="row justify-content-center">
        <?php
        $getAllBook = mysqli_query($conn, "SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori ORDER BY buku.id desc;");
        foreach($getAllBook as $book) {
            include "components/card-book.php";   
        }?>
        </div>

    </div>