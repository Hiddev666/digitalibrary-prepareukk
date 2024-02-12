<div class="container d-flex w-100">
        <div class="row justify-content-center">
        <?php
        $search = $_GET['search'];
        $getAllBook = mysqli_query($conn, "SELECT buku.id, buku.image, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join kategoribuku on kategoribuku.id = kategoribuku_relasi.id_kategori WHERE buku.judul LIKE '%$search%' ORDER BY buku.id desc;");
        if(mysqli_num_rows($getAllBook) != 0) {
            foreach($getAllBook as $book) {
                include "components/card-book.php";   
            }
        } else { ?>
            </div>
        <div class="container d-flex justify-content-center w-100 mt-5">
            <h3 class="text-center">Tidak Ada Hasil Pencarian Untuk <?= $search?>!</h3>
        </div>
        <?php } ?>

    </div>