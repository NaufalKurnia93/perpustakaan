<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman Detail</title>
  <!-- cdn bootsrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- cdn bootsrap css -->
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary p-3 fw-bold text-center h4">
        Daftar Peminjaman Detail
      </div>
      <div class="card-body border border-primary">
      <a href="index.php?page=peminjaman_detail&act=create" class="btn btn-md btn-info ml-3" style="margin-bottom: 16px">TAMBAH DATA</a>

        <table class="table table-bordered  border border-info table-hover table-sm">
          <thead class="thead">
            <tr class=" border border-info text-center">
              <th scope="col" class="fw-bold">Id Peminjaman</th>
              <th scope="col" class="fw-bold">BUKU</th>
              <th scope="col" class="fw-bold">DENDA</th>
              <th scope="col" class="fw-bold">Alksi</th>
            </tr>
          </thead>

          <tbody>
                   
          <?php
                  require_once 'database/koneksi.php';
                  require_once 'database/class/peminjaman_detail.php';

                      $pdo           = dataBase::connect();
                      $peminjaman_detail        =peminjaman_detail::getInstance($pdo);
                      $peminjaman_details    = $peminjaman_detail->getAll();
                      $no=1;
  
                        foreach ($peminjaman_details as $row) {
                          ?>  
                        
                        <tr>
                        <td><?php echo htmlspecialchars($row['id_peminjaman']); ?></td>
                        <td><?php echo htmlspecialchars($row['judul']); ?></td>
                        <td><?php echo htmlspecialchars($row['denda']); ?></td>
                        <td class="text-center">
                           <a href="index.php?page=peminjaman_detail&act=update&id_peminjaman_detail=<?php echo $row['id_peminjaman_detail'] ?>" class="btn btn-info btn-sm">Edit</a>

                          <a href="index.php?page=peminjaman_detail&act=delete&id_peminjaman_detail=<?php echo $row['id_peminjaman_detail'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Perhatian! Data Anda akan segera dihapus. Pastikan semua informasi penting telah dicadangkan.?')">Hapus</a>

                        </td>
                    </tr>
                 <?php
                }
            ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
