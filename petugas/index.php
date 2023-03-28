<?php 
session_start();

if($_SESSION['level']==""){
  header("location:../login.php?info=login");
}
?>
<?php 
include '../layouts/header.php';
include '../layouts/navbar.php';
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Dashboard</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">
      <div class="col-lg-12">        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h4>Histori Pembayaran</h4>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="histori_pembayaran.php" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <h6 class="card-title">Selamat Datang Di Merdeka SPP Wahai Petugas</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include '../layouts/footer.php';
?>