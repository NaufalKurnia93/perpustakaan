<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anggota</title>
  <!-- cdn bootsrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- cdn bootsrap css -->
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary p-3 fw-bold text-center h4">
        Daftar Anggota
      </div>
      <div class="card-body border border-primary">
      <a href="index.php?page=anggota&act=create" class="btn btn-md btn-info ml-3" style="margin-bottom: 16px">TAMBAH DATA</a>
      
        <table class="table table-bordered  border border-info table-hover table-sm">
          <thead class="thead">
            <tr class=" border border-info text-center">
            <th scope="col" class="fw-bold">No</th>
              <th scope="col" class="fw-bold">Nama</th>
              <th scope="col" class="fw-bold">Alamat</th>
              <th scope="col" class="fw-bold">No telepon</th>
              <th scope="col" class="fw-bold">Aksi</th>
            </tr>
          </thead>

          <tbody>
                   
               <?php
                  require_once 'database/koneksi.php';
                  require_once 'database/class/anggota.php';

                      $pdo           = dataBase::connect();
                      $anggota        =Anggota::getInstance($pdo);
                      $dataAnggota    = $anggota->getAll();
                      $no=1;
  
                        foreach ($dataAnggota as $row) {
                          ?>  
                        
                        <tr>
                        <td><?php echo $no++ ?></td>  
                        <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($row['no_telpon']); ?></td>
                        <td class="text-center">
                          <a href="index.php?page=anggota&act=update&id_anggota=<?php echo $row['id_anggota'] ?>" class="btn btn-info btn-sm">Edit</a>

                          <a href="index.php?page=anggota&act=delete&id_anggota=<?php echo $row['id_anggota'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Perhatian! Data Anda akan segera dihapus. Pastikan semua informasi penting telah dicadangkan.?')">Hapus</a>

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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
