<?php

 if(empty($_GET['id_peminjaman'])) {
  header("Location: index.php");
 } 

 $id_peminjaman = $_GET['id_peminjaman'];

 $pdo = dataBase::connect();
 $peminjaman = Peminjaman::getInstance($pdo);
 $result = $peminjaman->hapus($id_peminjaman);
 dataBase::disconnect();
 
 if ($result) {
     echo "<script>window.location.href = 'index.php?page=peminjaman';</script>";
 } else {
     echo "Terjadi kesalahan saat menghapus data.";
 }
 
 ?>