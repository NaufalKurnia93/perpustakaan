<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anggota</title>

</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header text-center">
        <h4 class="mb-0">Daftar Anggota</h4>
      </div>
      <div class="card-body">
        <a href="index.php?page=anggota&act=create" class="btn btn-info mb-3">TAMBAH DATA</a>
        
        <table class="table table-bordered table-hover table-sm">
          <thead class="thead-light">
            <tr class="text-center">
              <th scope="col" class="font-weight-bold">No</th>
              <th scope="col" class="font-weight-bold">Nama</th>
              <th scope="col" class="font-weight-bold">Alamat</th>
              <th scope="col" class="font-weight-bold">No Telepon</th>
              <th scope="col" class="font-weight-bold">Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php
              require_once 'database/koneksi.php';
              require_once 'database/class/anggota.php';

              $pdo = dataBase::connect();
              $anggota = Anggota::getInstance($pdo);
              $dataAnggota = $anggota->getAll();
              $no = 1;

              foreach ($dataAnggota as $row) {
            ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>  
                <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
                <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                <td><?php echo htmlspecialchars($row['no_telpon']); ?></td>
                <td class="text-center">
                  <a href="index.php?page=anggota&act=update&id_anggota=<?php echo $row['id_anggota'] ?>" class="btn btn-info btn-sm">Edit</a>
                  <a href="index.php?page=anggota&act=delete&id_anggota=<?php echo $row['id_anggota'] ?>" class="btn btn-danger btn-sm">Hapus</a>
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
<!-- 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        function hapus(id_anggota) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary mx-4',
                    cancelButton: 'btn btn-danger mx-4'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Hapus Data Pembelian',
                text: "Data kamu nggak bisa kembali lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, menghapus !',
                cancelButtonText: 'Tidak, batal !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Hapus!',
                        'File kamu telah dihapus.',
                        'success'
                    )
                    window.location.href = 'index.php?page=anggota&act=del&id_anggota=' + id;
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Batal',
                        'File kamu masih aman :)',
                        'error'
                    )
                }
            })
        }
    </script> -->
</body>
</html>

