<?php 

    require_once $PATH."models/peminjaman.php";
    require_once $PATH."models/ruangan.php";

    
    class peminjamanController{
        private $peminjam;
        private $ruangan;
        private $peminjaman;
        private $data = array();

        function __construct(){
            $this->peminjaman = new peminjaman();
        }

        function semuaPeminjaman($idRuangan){
            return $this->peminjaman->getPeminjaman($idRuangan);
        }

        function melakukanPeminjaman($ruangan, $data){
            return $this->peminjaman->tambahPeminjaman($data);  
        }

        /* Fungsi Lain */
        function mengkonfirmasiPeminjaman($ruangan){
            // code goes here 
        }
        function membatalkanPeminjaman($peminjaman){
            // code goes here 
        }
        function menyelesaikanPeminjaman($ruangan){
            // code goes here 
        }
    }

?>