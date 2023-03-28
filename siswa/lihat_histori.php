<?php 
session_start();

?>
<?php 
include '../layouts/header.php';
include '../layouts/navbar_siswa.php';
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0"></h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-12">
                <h3><center>Histori Pembayaran SPP</center></h3>          
              </div>
            <div class="card-body">
              <?php 
              include "../koneksi.php";
              $nisn = $_GET['nisn'];
              $mysqli_query = mysqli_query($koneksi, "SELECT * FROM siswa where nisn='$nisn'");
              while($data_siswa = mysqli_fetch_array($mysqli_query)){
                ?>
                <div class="col-sm-6">
                  <h5><b>Nama Siswa : <?=$data_siswa['nama']?></b></h5>
                </div>
              <?php } ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Tanggal Bayar</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>SPP</th>
                    <th>Bayaran Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include "../koneksi.php";
                  $nisn = $_GET['nisn'];
                  $mysqli_query = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn=siswa.nisn INNER JOIN spp ON pembayaran.id_spp=spp.id_spp");
                  $no = 1;
                  while($data = mysqli_fetch_array($mysqli_query)){
                    ?>
                    <tr>
                      <?php if ($nisn == $data['nisn']) { ?>
                       <td><?php echo $no++; ?></td>
                       <td><?=$data['tgl_bayar']?></td>
                       <td><?=$data['bulan_bayar']?></td>
                       <td><?=$data['tahun_bayar']?></td>
                       <td>Tahun <?=$data['tahun']?> Rp. <?= number_format($data['nominal'])?></td>
                       <td>Rp. <?= number_format($data['jumlah_bayar'])?></td>                       
                     <?php } else { ?>
                     <?php } ?>

                   </tr>                   
                 <?php } ?>
                 <?php
                 $no = 1;
                 include "../koneksi.php";
                 $siswa    =mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN spp ON siswa.id_spp=spp.id_spp");
                 while($d_siswa = mysqli_fetch_array($siswa)){
                  $data_pembayaran = mysqli_query($koneksi, "select SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran where nisn='$d_siswa[nisn]'");
                  $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                  $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                  $kekurangan = $d_siswa['nominal']-$data_pembayaran['jumlah_bayar'];
                  ?>
                  <tr>
                    <td colspan="5" class="text-center"><b>Total Pembayaran Masuk</b></td>
                    <td><b>Rp. <?php echo number_format($sudah_bayar); ?></b></td>
                  </tr>
                  <tr>
                    <td colspan="5" class="text-center"><b>Sisa Pembayaran</b></td>
                    <td><b>Rp. <?php echo number_format($kekurangan); ?></b></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php 
include '../layouts/footer.php';
?>