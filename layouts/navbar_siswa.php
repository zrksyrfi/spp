<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="#" class="navbar-brand">
      <img src="../assets/dist/img/logo_mdk.png" alt="" class="brand-image">
      <span class="brand-text font-weight-light">Merdeka SPP</span>
    </a>
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">Pembayaran</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="../siswa/histori_pembayaran.php" class="dropdown-item">Histori Pembayaran</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-upload"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</nav>