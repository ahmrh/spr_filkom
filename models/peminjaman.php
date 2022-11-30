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

    }

?>