<?php

if (empty($_GET['id_petugas'])) {
    header("Location: index.php");
}

$id_petugas = $_GET['id_petugas'];

$pdo = dataBase::connect();
$petugas = Petugas::getInstance($pdo);
$result = $petugas->hapus($id_petugas);
dataBase::disconnect();

if ($result == true) {
    echo "<script>window.location.href = 'index.php?page=petugas&cek=passed';</script>";
} else {
   echo "<script>window.location.href = 'index.php?page=petugas&cek=failed';</script>";
}

?>