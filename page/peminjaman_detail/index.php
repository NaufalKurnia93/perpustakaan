<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman Detail</title>
</head>

<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header ">
        Daftar Peminjaman Detail
      </div>
      <div class="card-body ">
        <a href="index.php?page=peminjaman_detail&act=create" class="btn btn-info mb-3">TAMBAH DATA</a>

        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr class="text-center">
              <th scope="col" class="font-weight-bold">Id Peminjaman</th>
              <th scope="col" class="font-weight-bold">BUKU</th>
              <th scope="col" class="font-weight-bold">DENDA</th>
              <th scope="col" class="font-weight-bold">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
            require_once 'database/koneksi.php';
            require_once 'database/class/peminjaman_detail.php';

            $pdo = dataBase::connect();
            $peminjaman_detail = Peminjaman_detail::getInstance($pdo);
            $peminjaman_details = $peminjaman_detail->getAll();

            foreach ($peminjaman_details as $row) {
            ?>
              <tr>
                <td class="text-center"><?php echo htmlspecialchars($row['id_peminjaman']); ?></td>
                <td><?php echo htmlspecialchars($row['judul']); ?></td>
                <td><?php echo htmlspecialchars($row['denda']); ?></td>
                <td class="text-center">
                  <a href="index.php?page=peminjaman_detail&act=update&id_peminjaman_detail=<?php echo $row['id_peminjaman_detail'] ?>"
                    class="btn btn-info btn-sm">Edit</a>
                  <a href="index.php?page=peminjaman_detail&act=delete&id_peminjaman_detail=<?php echo $row['id_peminjaman_detail'] ?>"
                    class="btn btn-danger btn-sm">Hapus</a>
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
  </div>

</body>

</html>
