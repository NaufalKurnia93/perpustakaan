<?php
// proses_peminjaman.php

// Pastikan koneksi database sudah dibuat
// Mendapatkan koneksi database
$peminjaman = Peminjaman::getInstance($pdo);
// Mengambil data dari form
$id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);
$denda = htmlspecialchars($_POST['denda']);

// Memperbarui status denda menjadi "Dikonfirmasi" di database
try {
    $stmt = $pdo->prepare("UPDATE peminjaman_detail SET status = 'Dikonfirmasi' WHERE id_peminjaman = :id_peminjaman AND denda = :denda");
    $stmt->bindParam(':id_peminjaman', $id_peminjaman);
    $stmt->bindParam(':denda', $denda);
    $stmt->execute();

    // Redirect ke halaman detail setelah konfirmasi
    header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
    exit;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$tarif_denda_per_hari = 1000; // Tarif denda per hari

if (isset($_POST['selesaikan_peminjaman'])) {
    $id_peminjaman = htmlspecialchars($_POST['id_peminjaman']);

    // Hitung durasi peminjaman
    $durasi = $peminjaman->hitungDurasiPeminjaman($id_peminjaman);

    if ($durasi > 0) {
        $denda = $peminjaman->hitungDenda($id_peminjaman, $tarif_denda_per_hari);

        // Jika denda melebihi batas, konfirmasi denda
        if ($denda > 0) {
            // Redirect ke halaman konfirmasi denda
            header("Location: index.php?page=peminjaman&act=konfirmasi_denda&id_peminjaman=" . urlencode($id_peminjaman));
            exit;
        } else {
            // Jika tidak ada denda atau denda sudah dikonfirmasi
            $peminjaman->selesaikanPeminjaman($id_peminjaman, $tarif_denda_per_hari);
            header("Location: index.php?page=peminjaman&act=detail&id_peminjaman=" . urlencode($id_peminjaman));
            exit;
        }
    }
}

?>


