<?php
// include_once 'database/koneksi.php';
// $pdo = dataBase::connect();

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- style content -->
  <style>
        .main-style-2 {
            padding-left: 100px;
        }

        .row-style2 {
            margin-left: -60px;
            margin-right: -20px;
        }

    </style>
</head>
<body>
  <!-- Main Content -->
  <div class="main-content main-style-2">
    <section class="section" style="margin-top: -5rem;">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>

      <div class="section-body text-dark">

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 col-12 mb-3">
            <div class="small-box bg-primary p-2">
              <div class="inner text-center ">
                <h4>Buku</h4>
                <h2>
                  <?= $jumlah_buku ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="index.php?page=buku" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-3">
            <div class="small-box bg-secondary p-2">
              <div class="inner text-center">
                <h4>Anggota</h4>
                <h2>
                  <?= $jumlah_anggota ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="index.php?page=anggota" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-3">
            <div class="small-box bg-success p-2">
              <div class="inner text-center">
                <h4>Peminjaman</h4>
                <h2>
                  <?= $jumlah_peminjaman ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-bookmark"></i>
              </div>
              <a href="index.php?page=peminjaman" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-3">
            <div class="small-box bg-info p-2">
              <div class="inner text-center">
                <h4>Penulis</h4>
                <h2>
                  <?= $jumlah_penulis ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-user-edit"></i>
              </div>
              <a href="index.php?page=penulis" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-3">
            <div class="small-box bg-warning p-2">
              <div class="inner text-center">
                <h4>Petugas</h4>
                <h2>
                  <?= $jumlah_petugas ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="index.php?page=petugas" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-2">
            <div class="small-box bg-danger p-2">
              <div class="inner text-center">
                <h4>Peminjaman Detail</h4>
                <h2>
                  <?= $jumlah_peminjaman_detail ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="index.php?page=peminjaman_detail" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-12 mb-0">
            <div class="small-box bg-secondary p-2">
              <div class="inner text-center">
                <h4>Kategori</h4>
                <h2>
                  <?= $jumlah_kategori ?>
                </h2>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="index.php?page=kategori" class="small-box-footer text-dark">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</body>
</html>

  