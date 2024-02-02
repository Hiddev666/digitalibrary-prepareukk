
<?php


session_start();
include("../../config/database.php");
require('../../fpdf/fpdf.php');

$id = $_GET['id'];
$queryPeminjaman = mysqli_fetch_array(mysqli_query($conn,"SELECT peminjaman.id, user.nama_lengkap, buku.judul, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian, peminjaman.status_peminjaman FROM buku INNER JOIN peminjaman on buku.id = peminjaman.id_buku INNER JOIN user ON user.id = peminjaman.id_user WHERE peminjaman.id='$id' ORDER BY peminjaman.id DESC;"));

$pdf = new FPDF();

$pdf->SetMargins(2,6,2);
$pdf->SetTopMargin(18);
$pdf->AddPage();

$pdf->SetFont('Courier','B',24);
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(30, 5, 'DIGITALIBRARY', 0, 1);
$pdf->SetFont('Courier','',13);
$pdf->Cell(10, 40, '', 10, 0);
$pdf->Cell(70, 10, 'Laporan Peminjaman', 0, 1);


$pdf->SetFont('Courier','B',12);
$pdf->Cell(30, 3, '', 10, 1);
$pdf->Cell(10, 10, '', 10, 0);
$pdf->Cell(40, 10, 'ID Peminjaman', 0, 0);
$pdf->SetFont('Courier','',12);
$pdf->Cell(40, 10, ": " . $queryPeminjaman['id'], 0, 1);

$pdf->SetFont('Courier','B',12);
$pdf->Cell(10, 10, '', 10, 0);
$pdf->Cell(40, 10, 'Nama Peminjam', 0, 0);
$pdf->SetFont('Courier','',12);
$pdf->Cell(40, 10, ": " . $queryPeminjaman['nama_lengkap'], 0, 1);

$pdf->SetFont('Courier','B',12);
$pdf->Cell(10, 10, '', 10, 0);
$pdf->Cell(35, 10, 'Judul Buku', 0, 0);
$pdf->SetFont('Courier','',12);
$pdf->Cell(35, 10, ": " . $queryPeminjaman['judul'], 0, 1);

$pdf->SetFont('Courier','B',12);
$pdf->Cell(10, 10, '', 10, 0);
$pdf->Cell(35, 10, 'Peminjaman', 0, 0);
$pdf->SetFont('Courier','',12);
$pdf->Cell(35, 10, ": " . $queryPeminjaman['tgl_peminjaman'], 0, 1);

$pdf->SetFont('Courier','B',12);
$pdf->Cell(10, 10, '', 10, 0);
$pdf->Cell(35, 10, 'Pengembalian', 0, 0);
$pdf->SetFont('Courier','',12);
$pdf->Cell(35, 10, ": " . $queryPeminjaman['tgl_pengembalian'], 0, 1);
$pdf->Output(); 


?>
<body>
<script>
    console.log("hello");
</script>
</body>