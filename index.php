<?php
 include_once('database/koneksi.php');
 include('database/class/access.php');

 $pdo = dataBase::connect();
 $user = Access::getInstance($pdo);
 $userInfo = $user->cari_pengguna();

 if (!$user->cekLogin() && $user->cekLogin() == false) {
    $login = isset($_GET['access']) ? $_GET['access'] : 'access';
    switch ($login) {
        case 'login':
            include 'access/login.php'; 
            break;
        case 'register':
            include 'access/register.php';
            break;
        case 'forgout':
            include 'access/edit_akun.php';
            break;
        default:
            include ('access/login.php'); 
            break;
    }
    exit; 
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        

if (isset($_GET['page'])) {
    $halaman_get = $_GET['page'];
} else {
    $halaman_get = "";
}

switch ($halaman_get) {
    case 'anggota':
        include('page/anggota/default.php');
        break;

    case 'petugas':
        include('page/petugas/default.php');
        break;

    case 'penulis':
        include('page/penulis/default.php');
        break;

    case 'kategori':
        include('page/kategori/default.php');
        break;

    case 'buku':
        include('page/buku/default.php');
        break;

    case 'peminjaman':
        include('page/peminjaman/default.php');
        break;

    case 'peminjaman_detail':
        include('page/peminjaman_detail/default.php');
        break;

    default:
        include('default.php');
        break;

}
    ?>

    <!-- sweet alert  -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {  //dijalankan ketika halaman di muat
        // Ambil parameter 'cek' dari URL
        const urlParams = new URLSearchParams(window.location.search); //query string
        const cek = urlParams.get('cek');

        //alert hapus

        switch (cek) {
            case 'passed':
                Swal.fire({
                    title: "apakah anda yakin menghapus data ini?",
                    text: "!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#387F39",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya saya yakin!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "MENGHAPUS!",
                            text: "data berhasil di hapus.",
                            icon: "success"
                        });
                    }
                });

                break;
                
            //alert tambah
            case 'add':
                Swal.fire({
                    position: "top-center",
                    icon: "success",
                    title: "berhasil di tambahkan",
                    showConfirmButton: false,
                    timer: 1500
                });
                break;

            //alert edit
            case 'up':
                Swal.fire({
                    title: "Menyimpan",
                    text: "data anda berhasil di simpan ",
                    icon: "success"
                });
        }
    });
</script>
</body>
</html>

