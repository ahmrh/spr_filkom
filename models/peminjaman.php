<?php 

    require_once $PATH.'config/database.php';
    
    class peminjaman{
        private $id;
        private $idPeminjam;
        private $idRuang;
        private $waktu;
        private $pelaksanaKegiatan;
        private $namaKegiatan;
        private $disetujui;

        function __construct(){

        }

        function tambahPeminjaman($data){
            $conn = db_connnect();
            $query = "INSERT INTO";
        }

        function getPeminjaman($idRuangan){
            $conn = db_connect();

            $sql = "SELECT namaKegiatan, pelaksanaKegiatan,
                TIME_FORMAT(mulai, '%h.%i %p'), 
                TIME_FORMAT(berhenti, '%h.%i %p') 
                FROM peminjaman WHERE idRuangan='$idRuangan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all();
              } else {
                echo "<br>0 results";
            }

        }

    }

?>