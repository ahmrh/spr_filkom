<form action="./" method="post" class="peminjaman-container">

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

    <input name='waktu' hidden value='<?= $waktu ?>'></input>
    <input name='ruangan' hidden value='<?= $idRuangan; ?>'></input> 
    <input name='form' hidden value=0></input> 
    
    <button>Pinjam Ruangan</button>

   
</form>