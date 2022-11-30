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
            return $this->ruangan->getRuangan($idRuangan);
        }
        function daftarRuanganTersedia($gedung, $waktu){
            return $this->ruangan->getRuanganTersedia($gedung);
        }

        function pinjamRuangan($idRuangan){
        }
    }

?>