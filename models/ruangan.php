<?php 
    require_once $PATH.'config/database.php';

    class ruangan{
        private $id;
        private $tersedia;
        private $nomorRuangan;
        private $gedung;

        function __construct(){
            $this->tersedia = true;
        }

    }

    function fillRuangan(){
        $conn = $db_connect();

        $sql = "
            INSERT INTO database
        ";
        
    }

?>