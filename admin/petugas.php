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
          <h1 class="m-0"> Petugas</h1>
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
                <h5>Data Petugas</h5>
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
                    <th>Username</th>
                    <th>Nama Petugas</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  include "../koneksi.php";
                  $petugas    =mysqli_query($koneksi, "SELECT * FROM petugas");
                  while($d_petugas = mysqli_fetch_array($petugas)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?=$d_petugas['username']?></td>
                      <td><?=$d_petugas['nama_petugas']?></td>
                      <td><?=$d_petugas['level']?></td>
                      <td>
                        <?php if ($d_petugas['username'] == $_SESSION['username']) { ?>
                          <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $d_petugas['id_petugas']; ?>"><i class="fas fa-edit"></i></a>
                        <?php } else { ?>
                          <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $d_petugas['id_petugas']; ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-hapus<?php echo $d_petugas['id_petugas']; ?>"><i class="fas fa-trash"></i></a>
                        <?php } ?>                      
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-edit<?php echo $d_petugas['id_petugas']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Data Petugas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" action="update_petugas.php">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="id_petugas" value="<?php echo $d_petugas['id_petugas']; ?>" hidden>
                                <input type="text" name="username" value="<?php echo $d_petugas['username']; ?>" class="form-control" placeholder="Masukan Username">
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" value="" class="form-control" placeholder="Masukan Password" required>
                              </div>
                              <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" name="nama_petugas" value="<?php echo $d_petugas['nama_petugas']; ?>" class="form-control" placeholder="Masukan Nama Petugas">
                              </div>
                              <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control">
                                  <option>--- Pilih Level ---</option>
                                  <option value="admin" <?php if($d_petugas['level'] == 'admin'){ echo 'selected'; } ?>>Admin</option>
                                  <option value="petugas" <?php if($d_petugas['level'] == 'petugas'){ echo 'selected'; } ?>>Petugas</option>
                                </select>
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

                    <div class="modal fade" id="modal-hapus<?php echo $d_petugas['id_petugas']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Hapus Data Petugas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda Yakin Akan Menghapus Data Ini !!!</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <a href="hapus_petugas.php?id_petugas=<?php echo $d_petugas['id_petugas']; ?>" class="btn btn-primary">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data Petugas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="simpan_petugas.php">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                            </div>
                            <div class="form-group">
                              <label>Nama Petugas</label>
                              <input type="text" name="nama_petugas" class="form-control" placeholder="Masukan Nama Petugas">
                            </div>
                            <div class="form-group">
                              <label>Level</label>
                              <select name="level" class="form-control">
                                <option>--- Pilih Level ---</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                              </select>
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