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

        function getRuanganTersedia($gedung){
            $conn = db_connect();

            $sql = "SELECT ruangan.id, ruangan.nomorRuangan, ruangan.gedung, count(peminjaman.id) FROM ruangan LEFT JOIN peminjaman ON ruangan.id = peminjaman.idRuangan WHERE gedung='$gedung' GROUP BY ruangan.id;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all();
              } else {
                echo "<br>0 results";
              }
        }

        function getRuangan($idRuangan){
            $conn = db_connect();

            $sql = "SELECT * from ruangan WHERE id='$idRuangan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_row();
              } else {
                echo "<br>0 results";
            }
        }


    }

?>