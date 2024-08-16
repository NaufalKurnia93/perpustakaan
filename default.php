<?php
include_once 'database/koneksi.php';
$pdo = dataBase::connect();

// Query SQL dan kode lainnya untuk menghitung jumlah table data yang ada
$sqlAnggota = 'SELECT COUNT(*) FROM anggota';
$resultAnggota = $pdo->query($sqlAnggota);
$jumlah_anggota = $resultAnggota->fetchColumn();

$sqlBuku = 'SELECT COUNT(*) FROM buku';
$resultBuku = $pdo->query($sqlBuku);
$jumlah_buku = $resultBuku->fetchColumn();

$sqlPeminjaman = 'SELECT COUNT(*) FROM peminjaman';
$resultPeminjaman = $pdo->query($sqlPeminjaman);
$jumlah_peminjaman = $resultPeminjaman->fetchColumn();

$sqlPenulis = 'SELECT COUNT(*) FROM penulis';
$resultPenulis = $pdo->query($sqlPenulis);
$jumlah_penulis = $resultPenulis->fetchColumn();

$sqlPetugas = 'SELECT COUNT(*) FROM petugas';
$resultPetugas = $pdo->query($sqlPetugas);
$jumlah_petugas = $resultPetugas->fetchColumn();


$sqlpeminjaman_detail = 'SELECT COUNT(*) FROM peminjaman_detail';
$resultpeminjaman_detail = $pdo->query($sqlpeminjaman_detail);
$jumlah_peminjaman_detail = $resultpeminjaman_detail->fetchColumn();


$sqlkategori = 'SELECT COUNT(*) FROM kategori';
$resultkategori = $pdo->query($sqlkategori);
$jumlah_kategori = $resultkategori->fetchColumn();

?>

<!--  Content -->

<head>
    <?php
    include 'layout/stylecss.php';
    ?>
</head>

<body>
    <?php
    include("layout/header.php");
    include("layout/sidebar.php");
    ?>
    <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">

      <div class="row justify-content-center ">
        <div class="col-md-6 col-lg-4 col-12 mb-3">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>Buku</h3>
              <h1><?= $jumlah_buku ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="index.php?page=buku" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-3">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>Anggota</h3>
              <h1><?= $jumlah_anggota ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <a href="index.php?page=anggota" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Peminjaman</h3>
              <h1><?= $jumlah_peminjaman ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-bookmark"></i>
            </div>
            <a href="index.php?page=peminjaman" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Penulis</h3>
              <h1><?= $jumlah_penulis ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-user-edit"></i>
            </div>
            <a href="index.php?page=penulis" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-3">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>Petugas</h3>
              <h1><?= $jumlah_petugas ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="index.php?page=petugas" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-2">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Peminjaman Detail</h3>
              <h1><?= $jumlah_peminjaman_detail ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="index.php?page=peminjaman_detail" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-12 mb-0">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>Kategori</h3>
              <h1><?= $jumlah_kategori ?></h1>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="index.php?page=kategori" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire("Selamat dataangg!");
    </script>
    
    <?php
  
    include("layout/stylejs.php");
    include("layout/footer.php");
    ?>
</body>
<!-- Main Content -->