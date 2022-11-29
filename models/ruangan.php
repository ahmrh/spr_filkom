<?php 
    require_once $PATH.'models/config/database.php';

    class ruangan{
        private $id;
        private $tersedia;
        private $nomorRuangan;
        private $gedung;

        function __construct(){
            $this->tersedia = true;
            $this->nomorRuangan = true;
        }

    }

?>