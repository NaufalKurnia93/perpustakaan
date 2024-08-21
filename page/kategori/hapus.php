<?php

if (empty($_GET['id_kategori'])) {
    header("Location: index.php");
}

$id_kategori = $_GET['id_kategori'];

$pdo = dataBase::connect();
$kategori = Kategori::getInstance($pdo);
$result = $kategori->hapus($id_kategori);
dataBase::disconnect();

if ($result == true) {
    echo "<script>window.location.href = 'index.php?page=kategori&cek=del';</script>";
} else {
   echo "<script>window.location.href = 'index.php?page=kategori&cek=failed';</script>";
}

?>