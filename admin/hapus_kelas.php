<?php
include "../koneksi.php";

$id_kelas = $_GET['id_kelas'];

mysqli_query($koneksi,"DELETE from kelas WHERE id_kelas='$id_kelas'");
header("location:kelas.php?info=hapus");
?>