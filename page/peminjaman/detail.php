<?php
$pdo = dataBase::connect();
$peminjaman = Peminjaman::getInstance($pdo);
$id_peminjaman = $_GET['id_peminjaman'];

$durasi = $peminjaman->hitungDurasiPeminjaman($id_peminjaman);

// Set flag ke true untuk menandai data telah disimpan
$data_saved = false;
if (isset($_POST['save'])) {

    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
    $id_buku = htmlspecialchars($_POST['id_buku']);
    $denda = htmlspecialchars($_POST['denda']);

    $peminjaman->tambahDetail($id_peminjaman, $id_buku, $denda);



    // Redirect ke halaman yang sama dengan parameter id_peminjaman
    // Redirect ke halaman detail
    header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
    exit;

}
?>

<!DOCTYPE html>
<html lang="en">

<body>

    <!-- Form Simpan pinjam Peminjaman -->
    <div class="container  mt-5">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="row ">
                        <div class="card border border-primary shadow col-4 ">
                            <div class="card-body py-2">
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right "> ID Buku</label>
                                    <div class="col-sm-8">
                                        <select class="form-control selectric" name="id_buku">
                                            <?php
                                            $rows = $peminjaman->getBook($id_peminjaman);

                                            foreach ($rows as $row) {
                                                ?>
                                                <option value="<?= $row['id_buku'] ?>">
                                                    <?= $row['id_buku'] ?>
                                                </option>

                                                <?php
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <p class="text-primary font-weight-bold text-center">
                                    <i class="fas fa-exclamation-triangle h3"></i>
                                    jika buku terlambat di kembalikan maka di kenakan denda
                                </p>

                                <div class="form-group p-0">
                                    <label for="jumlah_denda" class="text-dark">Jumlah Denda (Rp)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">Rp</span>
                                        </div>
                                        <input type="number" class="form-control" name="denda"
                                            placeholder="Masukkan jumlah denda" required>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary btn-inline text-right text-white ">
                                            <i class="fas fa-exclamation-circle "></i> Konfirmasi Denda
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">
                                Tambah
                            </button>
                        </div>

                        <div class=" card shadow col-sm-7 offset-1">

                            <div class="card-header row">
                                <div class="form-group col-5 mb-4">
                                    <label class="col-form-label text-md-right ">ID Pinjam</label>
                                    <input type="text" class="form-control bg-info text-light" name="id_peminjaman"
                                        value="<?= htmlspecialchars($id_peminjaman) ?>" readonly>

                                </div>

                                <!-- Durasi Peminjaman -->
                                <div class="form-group col-5 mb-4">
                                    <label class="col-form-label text-md-right">Durasi Peminjaman</label>

                                    <input type="text" class="form-control bg-info text-light"
                                        value="<?= htmlspecialchars($durasi) ?> hari" readonly>

                                </div>
                                <div class="col-2 mb-4 pb-2">
                                    <a href="index.php?page=peminjaman" class="btn btn-secondary shadow">Kembali</a>
                                </div>
                            </div>

                            <table class="table table-bordered table-hover text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Judul buku</th>
                                    <th>penerbit</th>
                                    <th>Denda</th>
                                    <th>Action</th>
                                </tr>

                                <?php
                                $i = 1;
                                $rows = $peminjaman->getDetail($id_peminjaman);
                                foreach ($rows as $row):
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php echo $i++ ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $row["judul"] ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php echo $row["penerbit"] ?>
                                        </td>
                                        <td class="align-middle">
                                            <?php echo $row["denda"] ?>
                                        </td>

                                        <td class="align-middle">
                                            <div class="btn-group " role="group">
                                                <a class="btn btn-danger btn-action mr-3" data-toggle="tooltip" title="Delete"
                                                    data-confirm="Apakah Anda Yakin Ingin Menghapus Data Dari Peminjaman?"
                                                    data-confirm-yes="window.location.href='index.php?page=peminjaman&act=delete&golkar=hapus&id_peminjaman=<?= htmlspecialchars($row['id_peminjaman']) ?>&id_buku=<?= htmlspecialchars($row['id_buku']) ?>'">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <a class="btn btn-success btn-action" data-toggle="tooltip"
                                                    title="Selesaikan"
                                                    data-confirm="Apakah Anda Yakin Ingin Menyelesaikan Peminjaman?"
                                                    data-confirm-yes="window.location.href='index.php?page=peminjaman&id_peminjaman=<?= htmlspecialchars($row['id_peminjaman']) ?>'">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </a>
                                            </div>
                                        </td>


                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </table>
                        </div>

                    </div>
                </form>
            </div>
        </div>
</body>

</html>