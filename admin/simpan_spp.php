<?php 
include '../koneksi.php';

$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

mysqli_query($koneksi,"insert into spp values('','$tahun','$nominal')");
header("location:spp.php?info=simpan");
?>