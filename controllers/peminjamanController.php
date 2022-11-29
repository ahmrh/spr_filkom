<?php 


    require_once $PATH."models/peminjaman.php";
    require_once $PATH."models/ruangan.php";
    
    class peminjamanController{
        private $peminjam;
        private $ruangan;
        private $data = array();

        function melakukanPeminjaman($ruangan, $data){
            
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