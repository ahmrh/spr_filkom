<?php 
    include '../../controllers/peminjamanController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css?<?php echo time(); ?>">
    <title>Daftar Ruangan</title>
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

                <li selected>
                    <a href="../DaftarRuangan">
                        <img src="../assets/images/ruang-icon.png" width=40 alt="" srcset="">
                        <p>Daftar Ruangan</p>
                    </a>
                </li>


                <li>
                    <a href="../Peminjaman">
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
        <h1>Pilih Gedung</h1>

        <h2>Silahkan Memilih Gedung dari Ruangan</h2>

        <form action="" method="get">

            <div class="card-container">
                <div class="card gedung">
                    <img src="../assets/images/gedung-f.png" width=300 height=165 alt="" srcset="">
                    <p>Gedung F</p>
                </div>

                <div class="card gedung">
                    <img src="../assets/images/gedung-g.png" width=300 height=165 alt="" srcset="">
                    <p>Gedung G</p>
                </div>
                
                <div class="card gedung">
                    <img src="../assets/images/gedung-gkm.png" width=300 height=165 alt="" srcset="">
                    <p>Gedung GKM</p>
                </div>
            </div>

        </form>

        
    </main>

    </div>
</body>
</html>