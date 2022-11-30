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

        function getRuangan($gedung){
            $conn = db_connect();

            $sql = "SELECT ruangan.nomorRuangan, ruangan.gedung, count(peminjaman.id) FROM ruangan LEFT JOIN peminjaman ON ruangan.id = peminjaman.idRuangan WHERE gedung='$gedung' GROUP BY ruangan.id;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all();
              } else {
                echo "<br>0 results";
              }
        }

        

        

    }


?>