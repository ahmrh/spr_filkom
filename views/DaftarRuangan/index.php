<?php 
    require_once '../../global_config.php';

    include_once $PATH.'controllers/peminjamanController.php';
    include_once $PATH.'controllers/ruanganController.php';

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
        <?php 
            if(empty($_GET['gedung'])){
                include_once './pilih-gedung.php';
            } 
            else{
                include_once './pilih-ruangan.php';
            }
            
        ?>
    </main>

    </div>
</body>
</html>