<div class="wrapper">
  <!-- Sidebar  -->
  <nav id="sidebar">
    <div class="sidebar-header">
      <img src="<?= base_url('assets/img/img_properties/logo.png'); ?>" alt="logo" class="img-fluid">
    </div>
        <?php 
          $className = explode('/', $_SERVER['REQUEST_URI']);
          $className = end($className);
        ?>

    <ul class="list-unstyled components">
      <?php if ($className == 'main'): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif ?>
        <a href="<?= base_url('main'); ?>"><i class="fas fa-fw fa-tachometer-alt"></i> Dashboard</a>
      </li>
      <?php if ($className == 'transaksi'): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif ?>
        <a href="<?= base_url('transaksi'); ?>"><i class="fas fa-fw fa-handshake"></i> Transaksi</a>
      </li>
      <?php if ($className == 'pembayaran'): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif ?>
        <a href="<?= base_url('pembayaran'); ?>"><i class="fas fa-fw fa-dollar-sign"></i> Pembayaran</a>
      </li>
      <li>
        <?php if ($className == 'outlet' || $className == 'user' || $className == 'menu'): ?>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><i class="fas fa-fw fa-align-left"></i> Management Data</a>
          <ul class="collapse list-unstyled show" id="homeSubmenu">
        <?php else: ?>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fw fa-align-left"></i> Management Data</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
        <?php endif ?>
          <li>
            <a href="<?= base_url('main/outlet'); ?>"><i class="fas fa-fw fa-store"></i> Outlet</a>
          </li>
          <?php if ($dataUser['jabatan'] == 'administrator'): ?>
            <li>
              <a href="<?= base_url('main/user'); ?>"><i class="fas fa-fw fa-user"></i> User</a>
            </li>
          <?php endif ?>
          <li>
            <a href="<?= base_url('main/menu'); ?>"><i class="fas fa-fw fa-utensils"></i> Menu</a>
          </li>
        </ul>
      </li>
      <?php if ($className == 'pengeluaran'): ?>
        <li class="active">
      <?php else: ?>
        <li>
      <?php endif ?>
        <a href="<?= base_url('pengeluaran'); ?>"><i class="fas fa-fw fa-share-square"></i> Pengeluaran</a>
      </li>
      <li>
        <?php if ($className == 'laporan' || $className == 'laporanPengeluaran'): ?>
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><i class="fas fa-fw fa-file-pdf"></i> Laporan</a>
          <ul class="collapse list-unstyled show" id="homeSubmenu2">
        <?php else: ?>
          <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fw fa-file-pdf"></i> Laporan</a>
          <ul class="collapse list-unstyled" id="homeSubmenu2">
        <?php endif ?>
          <li>
            <a href="<?= base_url('laporan'); ?>">Laporan</a>
          </li>
          <li>
            <a href="<?= base_url('laporanPengeluaran'); ?>">Laporan Pengeluaran</a>
          </li>
        </ul>
      </li>

      <li>
        <?php if ($className == 'log' || $className == 'logPengeluaran'): ?>
          <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle"><i class="fas fa-fw fa-file-signature"></i> Log</a>
          <ul class="collapse list-unstyled show" id="homeSubmenu3">
        <?php else: ?>
          <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-fw fa-file-signature"></i> Log</a>
          <ul class="collapse list-unstyled" id="homeSubmenu3">
        <?php endif ?>
          <li>
            <a href="<?= base_url('log'); ?>">Log</a>
          </li>
          <li>
            <a href="<?= base_url('logPengeluaran'); ?>">Log Pengeluaran</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
      </li>
    </ul>

    <ul class="list-unstyled">
        <p>Copyright 2020 &copy; By Andri Firman Saputra. All Right Reserved.</p>
      </li>
    </ul>
  </nav>

  <!-- Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Peringatan!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-dark">Apakah <strong><?= $dataUser['nama_user']; ?></strong> ingin keluar dari aplikasi?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-fw fa-times"></i> Batal</button>
          <a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content  -->
  <div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn merah-baru">
          <i class="fas fa-align-left"></i> | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
					
        </button>

        <ul class="nav navbar-nav ml-auto my-2">
          <li class="nav-item active">
            <a href="<?= base_url('main/profile'); ?>" class="btn merah-baru"><i class="fas fa-fw fa-user"></i> <?= $dataUser['nama_user']; ?></a>
          </li>
        </ul>
      </div>
    </nav>
    
    <div class="container-fluid">
