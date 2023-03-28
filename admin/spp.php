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
          <h1 class="m-0"> SPP</h1>
        </div>
        <div class="col-sm-6">
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container">
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <div class="row">
              <div class="col-6">
                <h5>Data SPP</h5>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
              </div>
            </div>            
          </div>
          <div class="card-body">
           <?php 
           if(isset($_GET['info'])){
            if($_GET['info'] == "hapus"){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-trash"></i> Sukses</h5>
                Data berhasil di hapus
              </div>
            <?php } else if($_GET['info'] == "simpan"){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses</h5>
                Data berhasil di simpan
              </div>
            <?php }else if($_GET['info'] == "update"){ ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-edit"></i> Sukses</h5>
                Data berhasil di update
              </div>
            <?php } } ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tahun</th>
                  <th>Nominal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                include "../koneksi.php";
                $spp    =mysqli_query($koneksi, "SELECT * FROM spp");
                while($d_spp = mysqli_fetch_array($spp)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?=$d_spp['tahun']?></td>
                    <td>Rp. <?= number_format($d_spp['nominal'])?></td>
                    <td>
                      <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $d_spp['id_spp']; ?>"><i class="fas fa-edit"></i></a>
                      <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_spp['id_spp']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-edit<?php echo $d_spp['id_spp']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data SPP</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="update_spp.php" method="post">
                            <div class="form-group">
                              <label>Tahun</label>
                              <input type="text" name="id_spp" value="<?php echo $d_spp['id_spp']; ?>" hidden>
                              <input type="text" name="tahun" class="form-control" value="<?php echo $d_spp['tahun']; ?>" placeholder="Masukan Tahun">
                            </div>
                            <div class="form-group">
                              <label>Nominal</label>
                              <input type="text" name="nominal" class="form-control" value="<?php echo $d_spp['nominal']; ?>" placeholder="Masukan Nominal">
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="modal-hapus<?php echo $d_spp['id_spp']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Hapus Data SPP</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form method="post" action="hapus_spp.php">
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Akan Menghapus Data Ini !!!</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <a href="hapus_spp.php?id_spp=<?php echo $d_spp['id_spp']; ?>" class="btn btn-primary">Hapus</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                <div class="modal fade" id="modal-tambah">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data SPP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="simpan_spp.php">
                          <div class="form-group">
                            <label>Tahun</label>
                            <input type="text" name="tahun" class="form-control" placeholder="Masukan Tahun">
                          </div>
                          <div class="form-group">
                            <label>Nominal</label>
                            <input type="text" name="nominal" class="form-control" placeholder="Masukan Nominal">
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include '../layouts/footer.php';
?>