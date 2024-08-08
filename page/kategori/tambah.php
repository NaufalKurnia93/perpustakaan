<?php 

$pdo = dataBase::connect(); //menyimpan objek pdo ke dalam variable $pdo

$kategori = Kategori::getInstance($pdo);

if (isset($_POST['save'])) {
    $nama_kategori = htmlspecialchars($_POST['nama_kategori']);

$result = $kategori->tambah($nama_kategori);

    if ($result) {
        echo "<script>window.location.href = 'index.php?page=kategori';</script>";
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
    <title>Tambah kategori</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-center">Tambah kategori</h4>
                   </div>
                   
                <div class="card-body p-4 border border-primary ">
                    <form action="" method="POST" class="p-3 border  rounded shadow-sm bg-light">

                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                             <input type="text"  name="nama_kategori" placeholder="Masukkan Nama Lengkap" class="form-control border border-primary">
                         </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" name="save" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>

                </div>
                    </div>
                        </div>
                         </div>
                            <div class="text-end">
                                <a href="index.php" class="btn btn-sm btn-primary p-2 mt-4">Kembaii</a>
                            </div>
                        </div>

    <script src="https://code.jquery.com/jquery-    3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
