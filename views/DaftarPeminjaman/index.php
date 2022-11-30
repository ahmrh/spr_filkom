<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css">
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
        <div class="row">
            <div class="col">
                <h2>Disetujui</h2>
                <?php 
                    $peminjaman_disetujui = $p_controller->
                
                ?>

            </div>
            <div class="col">
                <h2>Menunggu Persetujuan</h2>
                <?php 
                    $peminjaman_menunggu
                
                ?>
            </div>
        </div>



        
    </main>

    </div>
</body>
</html>