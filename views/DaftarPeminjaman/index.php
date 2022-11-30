<?php 
    require '../../config/global.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css?<?php echo time(); ?>">
    <title>Daftar Peminjaman</title>
</head>
<body>

    <div class="row">

    <aside>
        <nav>
            <ul>
                <li>
                    <a href="../Beranda">
                        <img src="../assets/images/home-icon.png" width=40 alt="" srcset="">
                        <p>Beranda</p>
                    </a>
                </li>

                <li >
                    <a href="../DaftarRuangan">
                        <img src="../assets/images/ruang-icon.png" width=40 alt="" srcset="">
                        <p>Daftar Ruangan</p>
                    </a>
                </li>


                <li selected>
                    <a href="../DaftarPeminjaman">
                        <img src="../assets/images/peminjaman-icon.png" width=40 alt="" srcset="">
                        <p>Daftar Peminjaman</p>
                    </a>
                </li>


                <li>
                    <a href="../err">
                        <img src="../assets/images/contact-icon.png" width=40 alt="" srcset="">
                        <p>Hubungi Kami</p>
                    </a>
                </li>


            </ul>
        </nav>
        <button id="keluar" class="light">Keluar</button>
    </aside>
    <main>
        <h1>Daftar Peminjaman Ruangan</h1>
        <div class="row daftar-peminjaman-container">
            <div class="col">
                <h2>Disetujui</h2>
                <?php 
                    $peminjaman_disetujui = $p_controller->daftarPeminjaman($idPengguna, 1);
                
                ?>

            </div>
            <div class="col ">
                <h2>Menunggu Persetujuan</h2>
                <ul>
                <?php 
                    $peminjaman_menunggu = $p_controller->daftarPeminjaman($idPengguna, 0);

                    if(isset($peminjaman_menunggu)){
                        foreach($peminjaman_menunggu as $p){
                            echo "<li><p><b>Ruang {$p[4]}{$p[5]}</b></p>
                            <p>Kegiatan = {$p[0]}</p>
                            <p>Peminjam = {$p[1]}</p>
                            <p>Waktu = {$p[2]} - {$p[3]} WIB </p>
                        </li>";
                            
                        }

                    }
                ?>
                        
                </ul>
            </div>
        </div>



        
    </main>

    </div>
</body>
</html>