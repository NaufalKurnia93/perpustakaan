<?php
// Mengimpor file kelas dan mengatur koneksi PDO
require_once 'database/class/buku.php';

// Koneksi PDO
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Membuat instansi kelas Buku
$buku = Buku::getInstance($pdo);

// Menghasilkan ID buku baru
$newID = $buku->generateNewID();

if ($newID) {
    echo "ID Buku Baru: " . $newID;
} else {
    echo "Gagal menghasilkan ID buku baru.";
}
