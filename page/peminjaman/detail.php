<?php
$pdo = dataBase::connect();
$peminjaman = Peminjaman::getInstance($pdo);

$id_peminjaman = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : null;

if ($id_peminjaman === null) {
    die("ID peminjaman tidak ditemukan.");
}

if (isset($_POST['save'])) {

    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
    $id_buku = htmlspecialchars($_POST['id_buku']);
    $denda = htmlspecialchars($_POST['denda']);


    // Debugging: Tampilkan nilai-nilai form
    // echo "ID Peminjaman (Form): " . $id_peminjaman . "<br>";
    // echo "ID Buku (Form): " . $id_buku . "<br>";
    // echo "Denda (Form): " . $denda . "<br>";

    if ($id_peminjaman && $id_buku && $denda) {
        $peminjaman->tambahDetail($id_peminjaman, $id_buku, $denda);
    } else {
        echo "Data tidak valid.";
    }

}
?>

<!-- Form Simpan pinjam Peminjaman -->
<div class="container  mt-5">
    <div class="card">

        <div class="card-body">
            <form method="POST">

                <div class="row ">


                    <div class="card border border-primary shadow col-4 ">
                        <div class="card-body pt-0 p-3">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right ">ID Pinjam</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_peminjaman"
                                        value="<?= htmlspecialchars($id_peminjaman) ?>" readonly>

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
                        <hr class="sidebar-divider d-none d-md-block">

                        <div class="row justify-content-center p-2">
                            <div class="col-sm-10 ">



                                <div class="form-group row mb-4">
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

                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="save">
                                    Tambah
                                </button>
                            </div>
                        </div>




                    </div>






                    <div class=" col-sm-7 offset-1">
                        <div class="card-header">Detail Peminjaman
                            <?= $id_peminjaman ?>
                        </div>
                        <table class="table table-striped table-md">
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
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                            data-confirm="Apakah Anda Yakin Ingin Menghapus Data Dari Peminjaman?"
                                            data-confirm-yes="window.location.href='index.php?page=peminjaman&act=delete&id_buku=<?= htmlspecialchars($row['id_buku']) ?>&id_peminjaman=<?= htmlspecialchars($row['id_peminjaman']) ?>'">
                                            <i class="fas fa-trash"></i>
                                        </a>
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