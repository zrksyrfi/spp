<?php
session_start();
include "koneksi.php";

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];

$login = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nisn='$nisn' AND nis='$nis'");
$cek = mysqli_num_rows($login);

if ($cek > 0){
        $_SESSION['nisn'] = $nisn;
        $_SESSION['nis'] = $nis;
        $_SESSION['nama'] = $nama;
        $_SESSION['status'] = "login";
        header("location:siswa/index.php");
}
?>