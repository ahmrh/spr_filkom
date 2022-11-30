<?php 
    $PATH = "../../";

    require_once $PATH.'config/database.php';
    include_once $PATH.'controllers/peminjamanController.php';
    include_once $PATH.'controllers/ruanganController.php';

    $idPengguna = 1;
    
    $r_controller = new ruanganController();
    $p_controller = new peminjamanController();

    // db_create();
    // table_drop();    
    // table_create();
    // table_fill();

?>