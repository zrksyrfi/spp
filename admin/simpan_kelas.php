<?php
include "../koneksi.php";

$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

mysqli_query($koneksi,"INSERT into kelas value('','$nama_kelas','$kompetensi_keahlian')");
header("location:kelas.php?info=simpan");
?>