<?php

// Mengecek apakah pengguna memiliki role yang diizinkan untuk menghapus data
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'super_admin') {
   // Jika bukan super_admin, redirect ke halaman anggota dengan pesan error
   echo "<script>window.location = 'index.php?page=anggota&cek=rawrIzin';</script>";
   exit; // Menghentikan eksekusi script
}

 if(empty($_GET['id_peminjaman'])) {
  header("Location: index.php");
 } 

 $id_peminjaman = $_GET['id_peminjaman'];

 $pdo = dataBase::connect();
 $peminjaman = Peminjaman::getInstance($pdo);
 $result = $peminjaman->hapus($id_peminjaman);
 dataBase::disconnect();
 
 if ($result == true) {
    echo "<script>window.location.href = 'index.php?page=peminjaman&cek=del';</script>";
} else {
   echo "<script>window.location.href = 'index.php?page=peminjaman&cek=failed';</script>";
}
 
 ?>