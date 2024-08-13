<?php

 if(empty($_GET['id_anggota'])) {
  header("Location: index.php");
 } 

 $id_anggota = $_GET['id_anggota'];

 $pdo = dataBase::connect();
 $anggota = Anggota::getInstance($pdo);
 $result = $anggota->hapus($id_anggota);
 dataBase::disconnect();
 
 if ($result == true) {
     echo "<script>window.location.href = 'index.php?page=anggota&cek=passed';</script>";
 } else {
    echo "<script>window.location.href = 'index.php?page=anggota&cek=failed';</script>";
 }
 
 ?>