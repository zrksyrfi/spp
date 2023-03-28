<?php 
include '../koneksi.php';

$id_petugas = $_POST['id_petugas'];
$nisn = $_POST['nisn'];
$tgl_bayar = date('Y-m-d');
$bulan_bayar = $_POST['bulan_bayar'];
$tahun_bayar = $_POST['tahun_bayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];

mysqli_query($koneksi,"insert into pembayaran values('','$id_petugas','$nisn','$tgl_bayar','$bulan_bayar','$tahun_bayar','$id_spp','$jumlah_bayar')");
header("location:transaksi_pembayaran.php?info=simpan");
?>