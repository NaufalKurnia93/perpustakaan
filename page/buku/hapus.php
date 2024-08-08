<?php

 if(empty($_GET['id_buku'])) {
  header("Location: index.php");
 } 

 $id_buku = $_GET['id_buku'];

 $pdo = dataBase::connect();
 $buku = Buku::getInstance($pdo);
 $result = $buku->hapus($id_buku);
 dataBase::disconnect();
 
 if ($result) {
     echo "<script>window.location.href = 'index.php?page=buku';</script>";
 } else {
     echo "Terjadi kesalahan saat menghapus data.";
 }
 
 ?>