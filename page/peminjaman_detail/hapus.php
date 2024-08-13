<?php

if (empty($_GET['id_peminjaman_detail'])) {
    header("Location: index.php");
}

$id_peminjaman_detail = $_GET['id_peminjaman_detail'];

$pdo = dataBase::connect();
$peminjaman_detail = peminjaman_detail::getInstance($pdo);
$result = $peminjaman_detail->hapus($id_peminjaman_detail);
dataBase::disconnect();

if ($result == true) {
    echo "<script>window.location.href = 'index.php?page=peminjaman_detail&cek=passed';</script>";
} else {
   echo "<script>window.location.href = 'index.php?page=peminjaman_detail&cek=failed';</script>";
}

?>