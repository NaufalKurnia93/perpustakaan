<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman</title>
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header ">
        Daftar Peminjaman
      </div>
      <div class="card-body ">
        <a href="index.php?page=peminjaman&act=create" class="btn btn-info mb-3">TAMBAH DATA</a>

        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr class="text-center">
              <th scope="col" class="font-weight-bold">No</th>
              <th scope="col" class="font-weight-bold">Anggota</th>
              <th scope="col" class="font-weight-bold">Tanggal Pinjam</th>
              <th scope="col" class="font-weight-bold">Tanggal Kembali</th>
              <th scope="col" class="font-weight-bold">Petugas</th>
              <th scope="col" class="font-weight-bold">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            require_once 'database/koneksi.php';
            require_once 'database/class/peminjaman.php';

            $pdo = dataBase::connect();
            $peminjaman = Peminjaman::getInstance($pdo);
            $dataPeminjaman = $peminjaman->getAll();
            $no = 1;

            foreach ($dataPeminjaman as $row) {
            ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal_pinjam']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal_kembali']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_petugas']); ?></td>
                <td class="text-center">
                  <a href="index.php?page=peminjaman&act=update&id_peminjaman=<?php echo $row['id_peminjaman'] ?>" class="btn btn-info btn-sm">Edit</a>
                  <a href="index.php?page=peminjaman&act=delete&id_peminjaman=<?php echo $row['id_peminjaman'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
              </tr>
            <?php
            }
            dataBase::disconnect();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="text-right mt-3">
      <a href="index.php?" class="btn btn-secondary">Kembali</a>
    </div>
  </div>

</body>

</html>
