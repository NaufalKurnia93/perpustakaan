<?php

$pdo = dataBase::connect(); //menyimpan objek pdo ke dalam variable $pdo

$peminjaman_detail = Peminjaman_detail::getInstance($pdo);

if (isset($_POST['save'])) {
    $id_peminjaman   = htmlspecialchars($_POST['id_peminjaman']);
    $id_buku         = htmlspecialchars($_POST['judul']);
    $denda           = htmlspecialchars($_POST['denda']);

    $result = $peminjaman_detail->tambah($id_peminjaman, $id_buku, $denda);

    if ($result) {
        echo "<script>window.location.href = 'index.php?page=peminjaman_detail&cek=add';</script>";
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
    <title>Tambah Peminjaman Detail</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Tambah Peminjaman Detail</h4>

                    </div>
                    <div class="card-body p-4">
                        <form action="" method="POST" class="border p-3">

                            <div class="form-group mb-2">
                                <label class="form-label">id Peminjaman</label>
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
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-label">Buku</label>
                                <select class="form-control" name="judul">
                                    <option value="">--pilih buku--</option>
                                    <?php
                                    $pdo = dataBase::connect();
                                    $peminjaman_detail = Peminjaman_detail::getInstance($pdo);
                                    ?>
                                    <?php foreach ($peminjaman_detail->getbuku() as $buku): ?>
                                        <option value="<?= $buku['id_buku'] ?>">
                                            <?= $buku['judul'] ?>
                                        </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label>Denda</label>
                                <input type="number" name="denda" placeholder="Masukkan  Denda" class="form-control">
                            </div>

                            <button type="submit" name="save" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>