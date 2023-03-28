<?php 
include '../koneksi.php';

$id_petugas = $_GET['id_petugas'];
mysqli_query($koneksi,"delete from petugas where id_petugas='$id_petugas'");
header("location:petugas.php?info=hapus");
?>