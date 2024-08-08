<?php 

$pdo = dataBase::connect(); //menyimpan objek pdo ke dalam variable $pdo

$peminjaman = Peminjaman::getInstance($pdo);

if (isset($_POST['save'])) {
    $id_anggota = htmlspecialchars($_POST['nama_anggota']);
    $tanggal_pinjam = htmlspecialchars($_POST['tanggal_pinjam']);
    $tanggal_kembali = htmlspecialchars($_POST['tanggal_kembali']);
    $id_petugas = htmlspecialchars($_POST['nama_petugas']);


$result = $peminjaman->tambah($id_anggota, $tanggal_pinjam, $tanggal_kembali, $id_petugas);

    if ($result) {
        echo "<script>window.location.href = 'index.php?page=peminjaman';</script>";
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
    <title>Tambah peminjaman</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <h3 class="text-center">Tambah peminjaman</h3>
                   
                </div>
                <div class="card-body p-4">
                    <form action="" method="POST">

                        <div class="form-group mb-2">
                           <label class="form-label">Anggota</label>
                                <select class="form-control" name="nama_anggota">
                                <option value="">--pilih anggota--</option>
                                <?php
                            $pdo = dataBase::connect();
                            $peminjaman = Peminjaman::getInstance($pdo);
                            ?>
                                <?php foreach ($peminjaman->getAnggota() as $anggota) : ?>
                            <option value="<?= $anggota['id_anggota'] ?>"><?= $anggota['nama_anggota'] ?></option>
                                <?php 
                                 endforeach;
                                ?>
                            </select>
                        </div>


                        <div class="form-group mb-2">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" placeholder="Masukkan  tanggal pinjam" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label>tanggal kembali</label>
                            <input type="date" name="tanggal_kembali" placeholder="Masukkan tanggal kembali" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                           <label class="form-label">Petugas</label>
                                <select class="form-control" name="nama_petugas">
                                <option value="">--pilih petugas--</option>
                                <?php
                            $pdo = dataBase::connect();
                            $peminjaman = Peminjaman::getInstance($pdo);
                            ?>
                                <?php foreach ($peminjaman->getPetugas() as $petugas) : ?>
                            <option value="<?= $petugas['id_petugas'] ?>"><?= $petugas['nama_petugas'] ?></option>
                                <?php 
                                 endforeach;
                                ?>
                            </select>
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