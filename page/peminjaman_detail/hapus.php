<?php

// Mengecek apakah pengguna memiliki role yang diizinkan untuk menghapus data
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'super_admin') {
    // Jika bukan super_admin, redirect ke halaman anggota dengan pesan error
    echo "<script>window.location = 'index.php?page=anggota&cek=rawrIzin';</script>";
    exit; // Menghentikan eksekusi script
}

if (empty($_GET['id_peminjaman_detail'])) {
    header("Location: index.php");
}

$id_peminjaman_detail = $_GET['id_peminjaman_detail'];

$pdo = dataBase::connect();
$peminjaman_detail = peminjaman_detail::getInstance($pdo);
$result = $peminjaman_detail->hapus($id_peminjaman_detail);
dataBase::disconnect();

if ($result == true) {
    echo "<script>window.location.href = 'index.php?page=peminjaman_detail&cek=del';</script>";
} else {
   echo "<script>window.location.href = 'index.php?page=peminjaman_detail&cek=failed';</script>";
}

?>