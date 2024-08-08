<?php 

$pdo = dataBase::connect(); //menyimpan objek pdo ke dalam variable $pdo

$buku = Buku::getInstance($pdo);

if (isset($_POST['save'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $id_kategori = htmlspecialchars($_POST['nama_kategori']);
    $id_penulis = htmlspecialchars($_POST['nama_penulis']);
    $penerbit = htmlspecialchars($_POST['penerbit']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);


$result = $buku->tambah($judul, $id_kategori, $id_penulis, $penerbit, $tahun_terbit);

    if ($result) {
        echo "<script>window.location.href = 'index.php?page=buku';</script>";
    } else {
        echo "peringatan! data gagal di tambahkan.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- cdn css bootstrap start -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- cdn css bootstrap end-->
    <title>Tambah Buku</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="text-center">Tambah Buku</h3>
                   
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">
                       

                        <div class="form-group mb-2">
                            <label>Judul</label>
                            <input type="text" name="judul" placeholder="Masukkan Nama buku " class="form-control">
                        </div>

                        <div class="form-group mb-2">
                           <label class="form-label">Kategori</label>
                                <select class="form-control" name="nama_kategori">
                                <option value="">--pilih kategori--</option>
                                <?php
                            $pdo = dataBase::connect();
                            $buku = Buku::getInstance($pdo);
                            ?>
                                <?php foreach ($buku->getkategori() as $kategori) : ?>
                            <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                <?php 
                                 endforeach;
                                ?>
                            </select>
                        </div>

                    <div class="form-group mb-2">
                           <label class="form-label">penulis</label>
                                <select class="form-control" name="nama_penulis">
                                <option value="">--pilih penulis--</option>
                                <?php
                            $pdo = dataBase::connect();
                            $buku = Buku::getInstance($pdo);
                            ?>
                                <?php foreach ($buku->getpenulis() as $penulis) : ?>
                            <option value="<?= $penulis['id_penulis'] ?>"><?= $penulis['nama_penulis'] ?></option>
                                <?php 
                                 endforeach;
                                ?>
                            </select>
                        </div>


                        <div class="form-group mb-2">
                            <label>Penerbit</label>
                            <input type="text" name="penerbit" placeholder="Masukkan nama penerbit" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label>Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" placeholder="Masukkan tahun terbit" class="form-control">
                        </div>

                        <button type="submit" name="save" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-danger">RESET</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end">g
    <a href="index.php" class="btn btn-sm btn-primary p-2 mt-4">Kembaii</a>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-    3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>