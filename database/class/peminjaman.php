<?php
    class Peminjaman{
        private $db;
        private static $instance = null;
    
        // Konstruktor untuk menginisialisasi 
    public function __construct($db_conn) {   
        $this->db = $db_conn;
    }

     // Mengambil instance dari kelas peminjaman(Singleton)
    public static function getInstance($pdo) { 
        if (self::$instance == null) {
            self::$instance = new Peminjaman($pdo);
            // echo "Koneksi klas berhasil!";
        }
        return self::$instance;
    }

    

    //menambah kan data play

public function tambah($id_anggota, $tanggal_pinjam, $tanggal_kembali, $id_petugas) {
    try {
        $stmt = $this->db->prepare("INSERT INTO peminjaman(id_anggota, tanggal_pinjam, tanggal_kembali, id_petugas) VALUES (:id_anggota, :tanggal_pinjam, :tanggal_kembali, :id_petugas)");

    $stmt->bindParam(":id_anggota", $id_anggota);
    $stmt->bindParam(":tanggal_pinjam", $tanggal_pinjam);
    $stmt->bindParam(":tanggal_kembali", $tanggal_kembali);
    $stmt->bindParam(":id_petugas", $id_petugas);
     $stmt->execute();
    return true;
} catch (PDOException $e) {
    echo $e->getMessage();
    return false;
    }
} 
    public function getID($id_peminjaman) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM peminjaman WHERE id_peminjaman= :id_peminjaman");
            $stmt->execute(array(":id_peminjaman" => $id_peminjaman));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $error) {
            echo $error-> getMessage();
            return false;
        }
    }

    // memperbarui data play
    public function edit($id_peminjaman, $id_anggota, $tanggal_pinjam, $tanggal_kembali,  $id_petugas) {
        try {
            $stmt = $this->db->prepare("UPDATE peminjaman SET id_anggota=:id_anggota,
            tanggal_pinjam=:tanggal_pinjam,
            tanggal_kembali=:tanggal_kembali,
            id_petugas=:id_petugas WHERE
            id_peminjaman=:id_peminjaman");

            $stmt->bindParam(":id_peminjaman", $id_peminjaman);
            $stmt->bindParam(":id_anggota", $id_anggota);
            $stmt->bindParam(":tanggal_pinjam", $tanggal_pinjam);
            $stmt->bindParam(":tanggal_kembali", $tanggal_kembali);
            $stmt->bindParam(":id_petugas", $id_petugas);
            $stmt->execute();
            return true;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

    //operasi hapus data peminjamanplay
    public function hapus($id_peminjaman) {
        try {
            $stmt = $this->db->prepare("DELETE FROM peminjaman WHERE id_peminjaman= :id_peminjaman");
            $stmt->bindParam(":id_peminjaman", $id_peminjaman);
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
            $stmt = $this->db->prepare("SELECT peminjaman.*, anggota.nama_anggota, petugas.nama_petugas
            FROM peminjaman
                JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota 
                JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas");

            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);  // mengambil semua baris hasil dari query
            return $data;
        } catch (PDOException $error) {
            echo $error->getMessage();
            return false;
        }
    }

        // operasi get anggota
        public function getAnggota()
        {
            try {
                $stmt = $this->db->prepare("SELECT id_anggota, nama_anggota FROM anggota");
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

    
    // operasi get petugas
    public function getPetugas()
    {
        try {
            $stmt = $this->db->prepare("SELECT id_petugas, nama_petugas FROM petugas");
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