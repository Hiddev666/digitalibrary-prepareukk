<div class="col mt-5">
    <?php
    $idUser = $_SESSION['user-id'];
    $bukuId = $book['id'];
    $checkPinjam = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_user=$idUser and id_buku=$bukuId and status_peminjaman='Dipinjam' LIMIT 1;");
    if (mysqli_num_rows($checkPinjam) != 0) { ?>
        <button class="btn btn-success position-absolute z-3">Dipinjam</button>
        <a href="?page=detail&id=<?= $book['id'] ?>" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
            <div class="card h-100" style="width: 16rem;">
                <img src="http://<?= $book['image'] ?>" class="card-img-top object-fit-cover" alt="..." style="width: 100%; height: 300px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="">
                            <h5 class="card-title"><?= $book['judul'] ?></h5>
                            <div class="d-flex gap-1 align-items-center">
                                <img src="../img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                                <p class="m-0">
                                    <?php
                                    $getRating = mysqli_fetch_array(mysqli_query($conn, "SELECT AVG(ulasanbuku.rating) as rate FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=$bukuId;"));
                                    if ($getRating['rate'] != NULL) {
                                        echo substr($getRating['rate'], 0, 3);
                                    } else {
                                        echo "-";
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <a href="?page=savekoleksi&bookid=<?= $book['id'] ?>">
                            <img src="../img/save<?php
                                                    $checkSaved = mysqli_query($conn, "SELECT * FROM koleksipribadi WHERE id_user=$idUser AND id_buku=$bukuId;");
                                                    if (mysqli_num_rows($checkSaved) != 0) {
                                                        echo "d";
                                                    }
                                                    ?>.svg" alt="" style="width: 18px;" class="">
                        </a>
                    </div>
                <?php } else { ?>
                    <a href="?page=detail&id=<?= $book['id'] ?>" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">

                        <div class="card h-100" style="width: 16rem;">
                            <img src="http://<?= $book['image'] ?>" class="card-img-top object-fit-cover" alt="..." style="width: 100%; height: 300px;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="">
                                        <h5 class="card-title"><?= $book['judul'] ?></h5>
                                        <div class="d-flex gap-1 align-items-center">
                                            <img src="../img/star-svgrepo-com.svg" alt="" style="width: 25px;">
                                            <p class="m-0">
                                                <?php
                                                $getRating = mysqli_fetch_array(mysqli_query($conn, "SELECT AVG(ulasanbuku.rating) as rate FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=$bukuId;"));
                                                if ($getRating['rate'] != NULL) {
                                                    echo substr($getRating['rate'], 0, 3);
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="?page=savekoleksi&bookid=<?= $book['id'] ?>">
                                        <img src="../img/save<?php
                                                                $checkSaved = mysqli_query($conn, "SELECT * FROM koleksipribadi WHERE id_user=$idUser AND id_buku=$bukuId;");
                                                                if (mysqli_num_rows($checkSaved) != 0) {
                                                                    echo "d";
                                                                }
                                                                ?>.svg" alt="" style="width: 18px;" class="">
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="d-flex flex-column gap-1 mt-4 justify-content-end">
                                <a href="?page=pinjam&bookid=<?= $book['id'] ?>" class="btn btn-warning w-100">Pinjam Sekarang</a>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>