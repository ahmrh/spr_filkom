<?php 
    $idRuangan = $_POST['ruangan'];
    $waktu = $_POST['waktu'];

    $ruangan = $r_controller->pilihRuangan($idRuangan);
    
    $gedung = $ruangan[3];
    $nomorRuangan = $ruangan[2];

?>

<h1>Ruangan <?=$gedung. " " .$nomorRuangan; ?> </h1>

<h2><?=$waktu ?></h2>


<form action="../Peminjaman" method="post" class="peminjaman-container">

    <h2>List Peminjam</h2>
    <ul>
        <?php 
            $peminjaman = $p_controller->semuaPeminjaman($idRuangan);
            if(isset($peminjaman)){
                foreach($peminjaman as $p){
                    echo "<li><p>Kegiatan = {$p[0]}</p>".
                    "<p>Peminjam = {$p[1]}</p>".
                    "<p>Waktu = {$p[2]} - {$p[3]} WIB </p></li>";
                    
                }

            }

        ?>

    </ul>

    
    <button>Pinjam Ruangan</button>

   
    <input name='ruangan' hidden value='<?= $idRuangan; ?>'></input> 
</form>