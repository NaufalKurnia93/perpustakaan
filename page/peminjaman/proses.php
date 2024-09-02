<?php
$peminjaman = Peminjaman::getInstance($pdo);


// Cek jika tombol selesaikan peminjaman ditekan
// Cek jika tombol selesaikan peminjaman ditekan
if (isset($_POST['selesaikan_peminjaman'])) {
    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
    $peminjaman->selesaikanPeminjaman($id_peminjaman);
    header("Location: index.php?page=peminjaman");
    exit;
}




if (isset($_POST['konfirmasi_denda'])) {
    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
    $denda = htmlspecialchars($_POST['denda']);
 // Log data sebelum diproses
 error_log("Konfirmasi denda: id_peminjaman=$id_peminjaman, denda=$denda");

 $peminjaman->konfirmasiDenda($id_peminjaman, $denda);
 
 // Log data setelah konfirmasi
 error_log("Redirecting to: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));    
 header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
    exit;
}



?>
