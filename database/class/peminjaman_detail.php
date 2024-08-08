<?php
    class Peminjaman_detail{
        private $db;
        private static $instance = null;
    
        // Konstruktor untuk menginisialisasi 
    public function __construct($db_conn) {   
        $this->db = $db_conn;
    }

     // Mengambil instance dari kelas peminjaman(Singleton)
    public static function getInstance($pdo) { 
        if (self::$instance == null) {
            self::$instance = new Peminjaman_detail($pdo);
            // echo "Koneksi klas berhasil!";
        }
        return self::$instance;
    }

    

    //menambah kan data play

public function tambah($id_peminjaman, $id_buku, $denda) {
    try {
        $stmt = $this->db->prepare("INSERT INTO peminjaman_detail(id_peminjaman, id_buku, denda) VALUES (:id_peminjaman, :id_buku, :denda )");

    $stmt->bindParam(":id_peminjaman", $id_peminjaman);
    $stmt->bindParam(":id_buku", $id_buku);
    $stmt->bindParam(":denda", $denda);
     $stmt->execute();
    return true;
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
    }
} 
    public function getID($id_peminjaman_detail) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM peminjaman_detail WHERE id_peminjaman_detail= :id_peminjaman_detail");
            $stmt->execute(array(":id_peminjaman_detail" => $id_peminjaman_detail));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $error) {
            echo $error-> getMessage();
            return false;
        }
    }

    // memperbarui data play
    public function edit($id_peminjaman_detail, $id_peminjaman, $id_buku, $denda) {
        try {
            $stmt = $this->db->prepare("UPDATE peminjaman_detail SET id_peminjaman=:id_peminjaman,
            id_buku=:id_buku,
            denda=:denda, WHERE
            id_peminjaman_detail=:id_peminjaman_detail");

            $stmt->bindParam(":id_peminjaman_detail;", $id_peminjaman_detail);
            $stmt->bindParam(":id_peminjaman", $id_peminjaman);
            $stmt->bindParam(":id_buku", $id_buku);
            $stmt->bindParam(":denda", $denda);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    //operasi hapus data peminjamanplay
    public function hapus($id_peminjaman_detail) {
        try {
            $stmt = $this->db->prepare("DELETE FROM peminjaman_detail WHERE id_peminjaman_detail= :id_peminjaman_detail");
            $stmt->bindParam(":id_peminjaman_detail", $id_peminjaman_detail);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } 

    // operasi get all peminjaman play
    public function getAll() {
        try {
            $stmt = $this->db->prepare("SELECT peminjaman_detail.*, peminjaman.id_peminjaman, buku.judul
            FROM peminjaman_detail
                JOIN peminjaman ON peminjaman_detail.id_peminjaman = peminjaman.id_peminjaman 
                JOIN buku ON peminjaman_detail.id_buku = buku.id_buku");

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  // mengambil semua baris hasil dari query
            return $data;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

        // operasi get peminjaman
        public function getPeminjaman()
        {
            try {
                $stmt = $this->db->prepare("SELECT id_peminjaman, nama_peminjaman FROM peminjaman");
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    
    // operasi get buku
    public function getBuku()
    {
        try {
            $stmt = $this->db->prepare("SELECT id_buku, nama_buku FROM buku");
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

?>