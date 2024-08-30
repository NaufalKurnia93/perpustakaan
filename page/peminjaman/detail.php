<?php

$pdo = dataBase::connect();
$peminjaman = Peminjaman::getInstance($pdo);
$id_peminjaman = $_GET['id_peminjaman'];

$durasi = $peminjaman->hitungDurasiPeminjaman($id_peminjaman);
$tarif_denda_per_hari = 1000; // Tarif denda per hari

// Jika tombol "Simpan" ditekan
if (isset($_POST['save'])) {
    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
    $id_buku = htmlspecialchars($_POST['id_buku']);
    $denda = htmlspecialchars($_POST['denda']);

    $peminjaman->tambahDetail($id_peminjaman, $id_buku, $denda);

    // Redirect ke halaman detail dengan parameter id_peminjaman
    header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
    exit;
}

// Jika tombol "Selesaikan" ditekan
if (isset($_POST['selesaikan_peminjaman'])) {
    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);

    // Hitung durasi peminjaman
    $durasi = $peminjaman->hitungDurasiPeminjaman($id_peminjaman);

    if ($durasi > 0) {
        $denda = $peminjaman->hitungDenda($id_peminjaman, $tarif_denda_per_hari);

        // Jika denda melebihi batas, konfirmasi denda
        if ($denda > 0) {
            // Redirect ke halaman konfirmasi denda
            header("Location: index.php?page=peminjaman&act=konfirmasi_denda&id_peminjaman=" . urlencode($id_peminjaman));
            exit;
        } else {
            // Jika tidak ada denda atau denda sudah dikonfirmasi
            $peminjaman->selesaikanPeminjaman($id_peminjaman, $tarif_denda_per_hari);
            header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<body>

    <!-- Form Simpan Pinjam Peminjaman -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="card border border-primary shadow col-3">
                            <div class="card-body py-2">
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right">ID Buku</label>
                                    <div class="col-sm-12">
                                        <select class="form-control selectric" name="id_buku">
                                            <?php
                                            $rows = $peminjaman->getBook($id_peminjaman);
                                            foreach ($rows as $row):
                                                ?>
                                                <option value="<?= $row['id_buku'] ?>">
                                                    <?= $row['id_buku'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <hr class="sidebar-divider d-none d-md-block">

                                <p class="text-primary font-weight-bold text-center">
                                    <i class="fas fa-exclamation-triangle h3"></i>
                                    Jika buku terlambat dikembalikan, maka dikenakan denda.
                                </p>


                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">
                                Tambah
                            </button>
                        </div>

                        <div class="card shadow col-sm-8 offset-1">
                            <div class="card-header row">
                                <div class="form-group col-5 mb-4">
                                    <label class="col-form-label text-md-right">ID Pinjam</label>
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
                </form>
                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penerbit</th>
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
                                <?= $i++ ?>
                            </td>
                            <td class="align-middle">
                                <?= $row["judul"] ?>
                            </td>
                            <td class="align-middle">
                                <?= $row["penerbit"] ?>
                            </td>
                            <td class="align-middle">
                                <?php
                                $badgeClass = '';
                                $statusText = '';

                                switch ($row["status"]) {
                                    case 'Belum Dikonfirmasi':
                                        $badgeClass = 'badge-warning';
                                        $statusText = 'Belum Dikonfirmasi';
                                        break;
                                    case 'Dikonfirmasi':
                                        $badgeClass = 'badge-success';
                                        $statusText = 'Dikonfirmasi';
                                        break;
                                    default:
                                        $badgeClass = 'badge-secondary';
                                        $statusText = 'Status Tidak Diketahui';
                                        break;
                                }
                                ?>
                                <span class="badge <?= htmlspecialchars($badgeClass) ?>">
                                    <?= htmlspecialchars($statusText) ?>
                                </span>
                            </td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a class="btn btn-danger btn-action mr-3" data-toggle="tooltip" title="Delete"
                                        data-confirm="Apakah Anda Yakin Ingin Menghapus Data Dari Peminjaman?"
                                        data-confirm-yes="window.location.href='index.php?page=peminjaman&act=delete&golkar=hapus&id_peminjaman=<?= htmlspecialchars($row['id_peminjaman']) ?>&id_buku=<?= htmlspecialchars($row['id_buku']) ?>'">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <!-- Tombol selesaikan peminjaman -->
                                    <form action="index.php?page=peminjaman&act=proses" method="post">
                                        <input type="hidden" name="id_peminjaman"
                                            value="<?= htmlspecialchars($id_peminjaman) ?>">
                                        <button type="submit" class="btn btn-primary" name="selesaikan_peminjaman">Selesaikan</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <form action="index.php?page=peminjaman&act=proses" method="post">
            <div class="form-group p-0">
                <label for="jumlah_denda" class="text-dark">Jumlah Denda (Rp)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-white">Rp</span>
                    </div>
                    <input type="text" class="form-control" name="denda" placeholder="Masukkan jumlah denda">
                </div>

                <!-- Menyertakan id_peminjaman dan denda sebagai hidden fields -->
                <input type="hidden"  name="id_peminjaman" value="<?php echo $id_peminjaman; ?>">
                <input type="hidden" name="denda" value="<?php echo $denda; ?>">
                <button type="submit" class="btn btn-primary" name="konfirmasi_denda">Konfirmasi Denda</button>

            </div>
        </form>
    </div>
    <div class="card-footer">
        <h5 class="text-right">Total Denda: Rp
            <?= $peminjaman->getDenda($id_peminjaman) ?>
        </h5>
    </div>
    </div>
    </div>
</body>

</html>