<?php

if (empty($_GET['id_peminjaman_detail'])) {
  header("location: index.php?page=peminjaman_detail");
  exit(); // kode selanjut nya tidak akan di eksekusi
}

$id_peminjaman_detail = $_GET['id_peminjaman_detail'];
$pdo = dataBase::connect();
$peminjaman_detail = Peminjaman_detail::getInstance($pdo);

// Jika tombol 'save' ditekan
if (isset($_POST['save'])) {
  $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
  $id_buku = htmlspecialchars($_POST['judul']);
  $denda = htmlspecialchars($_POST['denda']);

  // Coba edit data buku dan cek hasilnya
  if ($peminjaman_detail->edit($id_peminjaman_detail, $id_peminjaman, $id_buku, $denda)) {
    header("location: index.php?page=peminjaman_detail&cek=up");
    // exit();
  } else {
    echo "maaf data gagal di simpan";
  }

  // Jika tombol 'save' tidak ditekan, blok ini akan dieksekusi
} else {
  $data = $peminjaman_detail->getID($id_peminjaman_detail);
  if (!$data) {
    header("location: index.php?page=peminjaman_detail");
    exit();
  }

  //// Ambil data peminjaman_detail untuk ditampilkan di form
  $id_peminjaman = htmlspecialchars($data['id_peminjaman']);
  $id_buku = htmlspecialchars($data['id_buku']);
  $denda = htmlspecialchars($data['denda']);

}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Edit peminjaman detail</title>
</head>

<body>

  <div class="container" style="margin-top: 80px">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header text-center bg-primary">
            Edit peminjaman detail
          </div>
          <div class="card-body">
            <form action="" method="POST">

              <div class="form-group mb-2">
                <label class="form-label">Id peminjaman</label>
                <select class="form-control" name="id_peminjaman">
                  <option value="">--pilih id--</option>
                  <?php
                  $pdo = dataBase::connect();
                  $peminjaman_detail = Peminjaman_detail::getInstance($pdo);
                  ?>
                  <?php foreach ($peminjaman_detail->getPeminjaman() as $pinjam): ?>
                    <option value="<?= $pinjam['id_peminjaman'] ?>">
                      <?= $pinjam['id_peminjaman'] ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>

              <div class="form-group mb-2">
                <label class="form-label">buku</label>
                <select class="form-control" name="judul">
                  <option value="">--buku--</option>
                  <?php
                  $pdo = dataBase::connect();
                  $peminjaman_detail = peminjaman_detail::getInstance($pdo);
                  ?>
                  <?php foreach ($peminjaman_detail->getBuku() as $buku): ?>
                    <option value="<?= $buku['id_buku'] ?>">
                      <?= $buku['judul'] ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
              <div class="form-group">
                <label>Denda</label>
                <input type="number" name="denda" value="<?php echo $denda; ?>" placeholder="Masukkan denda"
                  class="form-control">
              </div>

              <button type="submit" name="save" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">RESET</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>