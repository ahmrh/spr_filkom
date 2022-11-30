<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/style.css?<?php echo time(); ?>">
    <title>Beranda</title>
</head>
<body>

    <div class="row">

    <aside>
        <nav>
            <ul>
                <li selected>
                    <a href="../Beranda">
                        <img src="../assets/images/home-icon.png" width=40 alt="" srcset="">
                        <p>Beranda</p>
                    </a>
                </li>

                <li>
                    <a href="../DaftarRuangan/">
                        <img src="../assets/images/ruang-icon.png" width=40 alt="" srcset="">
                        <p>Daftar Ruangan</p>
                    </a>
                </li>


                <li>
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
        <h1>Alur Peminjaman Ruangan <br> FILKOM UB</h1>
        <ol>
            <li>Memilih ruangan yang dibutuhkan dan pastikan ruangan tersebut tersedia</li>
            <li>Mengisi form peminjaman yang disediakan oleh sistem </li>
            <li>Menunggu konfirmasi dari pihak admin</li>
            <li>Mengirimkan KTM dan Dokumen yang diperlukan ke pihak admin di <b>ruang A 1.1</b></li>
            <li>Setelah ruangan selesai, kembali ke pihak admin untuk mengambil KTM dan menandakan ruangan telah selesai digunakan</li>
        </ol>

        <a href="../DaftarRuangan/">
            <button>Pinjam Ruangan</button>
        </a>

    </main>

    </div>
</body>
</html>