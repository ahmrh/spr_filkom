<?php 
    $idRuangan = $_POST['ruangan'];
    $waktu = $_POST['waktu'];

    $ruangan = $r_controller->pilihRuangan($idRuangan);
    
    $gedung = $ruangan[3];
    $nomorRuangan = $ruangan[2];

?>

<h1>Ruangan <?=$gedung. " " .$nomorRuangan; ?> </h1>

<h2><?=$waktu ?></h2>

<?php 

    if(isset($_POST['form'])){
        include './ruangan-peminjaman.php';
    } else {
        include './ruangan-detail.php';
    } 


?>


