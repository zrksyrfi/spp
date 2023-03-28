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
          <h1 class="m-0"> Histori Pembayaran</h1>
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
                <h5>Data Histori Pembayaran</h5>
              </div>
              <div class="col-6 text-right">
                <a href="print_laporan.php" class="btn btn-primary btn-sm" target="blank_"><i class="fas fa-print"></i> Print Laporan</a>
              </div>
            </div>            
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Siswa</th>
                  <th>SPP</th>
                  <th>Sisa Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1.</td>
                  <td>Nama Siswa</td>
                  <td>SPP</td>
                  <td>Sisa Bayar</td>
                  <td>
                    <div class="btn btn-success btn-sm">LUNAS</div>
                    <div class="btn btn-warning btn-sm">BELUM LUNAS</div>
                  </td>
                </tr>
                <div class="modal fade" id="modal-edit">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Lihat Data Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label>Nama Siswa</label>
                            <select name="id_kelas" class="form-control">
                              <option>--- Pilih Siswa ---</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>SPP</label>
                            <select name="id_kelas" class="form-control">
                              <option>--- Pilih SPP ---</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" name="nis" class="form-control" placeholder="Masukan NIS">
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="modal-hapus">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus Data Siswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah Anda Yakin Akan Menghapus Data Ini !!!</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                        <button type="button" class="btn btn-primary">Hapus</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="modal-tambah">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Siswa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label>NISN</label>
                            <input type="text" name="nisn" class="form-control" placeholder="Masukan NISN">
                          </div>
                          <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="Masukan NIS">
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Siswa">
                          </div>
                          <div class="form-group">
                            <label>Kelas</label>
                            <select name="id_kelas" class="form-control">
                              <option>--- Pilih Kelas ---</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" placeholder="Masukan Alamat ..."></textarea>
                          </div>
                          <div class="form-group">
                            <label>NO. Telephone</label>
                            <input type="text" name="no_telp" class="form-control" placeholder="Masukan NO. Telephone">
                          </div>
                          <div class="form-group">
                            <label>Data SPP</label>
                            <select name="id_spp" class="form-control">
                              <option>--- Pilih Data SPP ---</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
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