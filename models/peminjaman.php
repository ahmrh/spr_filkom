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
            $conn = db_connect();
            $idRuangan = $data['ruangan'];
            $idPeminjam = 1;
            $namaKegiatan = $data['namaKegiatan'];
            $pelaksanaKegiatan = $data['pelaksanaKegiatan'];
            $waktu = $data['waktu'];
            $mulai = $data['mulai'];
            $berhenti = $data['berhenti'];


            $sql = "INSERT INTO peminjaman (idRuangan, idPeminjam, namaKegiatan, pelaksanaKegiatan, waktu,  mulai, berhenti) VALUES
                ('$idRuangan', '$idPeminjam', '$namaKegiatan', '$pelaksanaKegiatan', '$waktu', '$mulai', '$berhenti');
            ";

            return $conn->query($sql);

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

        function getDaftarPeminjaman($idPengguna, $disetujui){
            $conn = db_connect();


            $sql = "SELECT namaKegiatan, pelaksanaKegiatan, TIME_FORMAT(mulai, '%h.%i %p'), TIME_FORMAT(berhenti, '%h.%i %p'), ruangan.gedung, ruangan.nomorRuangan FROM peminjaman LEFT JOIN ruangan on peminjaman.idRuangan=ruangan.id WHERE idPeminjam='$idPengguna' AND disetujui=$disetujui;

                ";
            



            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all();
              } else {
                echo "<br>0 results";
            }

        }

    }

?>