<?php 

    require_once $PATH.'models/peminjaman.php';
    require_once $PATH.'models/ruangan.php';

    class ruanganController{
        private $ruangan;
        private $idRuangan;
        private $gedung;
        private $waktu;

        function __construct(){
            $this->ruangan = new ruangan();
        }

        function mengubahStateRuangan(){
        }

        function pilihRuangan($idRuangan){
            
        }
        function daftarRuanganTersedia($gedung, $waktu){
            return $this->ruangan->getRuangan($gedung);
        }

        function pinjamRuangan($idRuangan){
        }
    }

?>