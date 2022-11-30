<?php 

    $data = $_POST;
    if($_POST['form'] == 1)
        if($p_controller->melakukanPeminjaman($ruangan, $data)){
            header("Location: ../DaftarPeminjaman", TRUE, 301);
            exit();
        }

?>

<form action="./" method="post" class="peminjaman-container" onsubmit="return confirm('Anda yakin data yang diisi telah benar?');">

    <div class="input-group form-peminjaman">
        <div class="col">
            <input type="text" name="namaKegiatan" placeholder="Nama Kegiatan" required>
            <input type="text" name="pelaksanaKegiatan" placeholder="Pelaksana Kegiatan" required>
        </div>
        <div class="col">
            <div class="time-group">

                <input type="time" name="mulai" required>
                <p>-</p>
                <input type="time" name="berhenti" required>
            </div>
            <input type="file" name="dokumen">
        </div>
    </div>

    <input name='waktu' hidden value='<?= $waktu ?>'></input>
    <input name='ruangan' hidden value='<?= $idRuangan; ?>'></input> 
    <input name='form' hidden value=1></input> 

    
    <button>Submit</button>

   
</form>