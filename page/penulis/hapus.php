<?php

 if(empty($_GET['id_penulis'])) {
  header("Location: index.php");
 } 

 $id_penulis = $_GET['id_penulis'];

 $pdo = dataBase::connect();
 $penulis = Penulis::getInstance($pdo);
 $result = $penulis->hapus($id_penulis);
 dataBase::disconnect();
 
 if ($result) {
     echo "<script>window.location.href = 'index.php?page=penulis';</script>";
 } else {
     echo "Terjadi kesalahan saat menghapus data.";
 }
 
 ?>