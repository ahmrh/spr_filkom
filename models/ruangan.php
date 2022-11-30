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

        function getRuanganTersedia($gedung, $waktu){
            $conn = db_connect();

            $sql = "SELECT * FROM ruangan WHERE tersedia=true";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                return $result->fetch_all();
              } else {
                echo "<br>0 results";
              }

        }

    }


?>