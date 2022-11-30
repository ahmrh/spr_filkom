<?php
    function db_connect($database = "spr_db"){
        $servername = "localhost";
        $username = "root";
        $password = "root";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        return $conn;
    }
    
    function db_create(){
        $conn = db_connect("");

        $sql = "CREATE DATABASE IF NOT EXISTS spr_db";
        if ($conn->query($sql) === TRUE) {
            echo "Database berhasil dibuat";
        } else {
            echo "Terjadi kesalahan : " . $conn->error;
        }

        $conn->close();
    }

    function table_create(){
        $conn = db_connect();

        // ruangan tabel 
        $sql = "
            CREATE TABLE IF NOT EXISTS ruangan (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                tersedia BOOLEAN NOT NULL DEFAULT FALSE,
                nomorRuangan VARCHAR(10) NOT NULL,
                gedung VARCHAR(10) NOT NULL
            );
        ";

        if($conn->query($sql) === TRUE)
            echo "Tabel ruangan telah dibuat";
        else 
            echo "Kesalahan dalam membuat tabel ruangan : " . $conn->error;

        
        // pengguna tabel 
        $sql = "
            CREATE TABLE IF NOT EXISTS pengguna (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                nomorInduk VARCHAR(30) NOT NULL,
                isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
                state BOOLEAN NOT NULL DEFAULT FALSE
            )
        ";

        if($conn->query($sql) === TRUE)
            echo "Tabel pengguna telah dibuat";
        else 
            echo "Kesalahan dalam membuat tabel pengguna : " . $conn->error;
        

        // peminjaman tabel 
        $sql = "
            CREATE TABLE IF NOT EXISTS peminjaman (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                idPeminjam INT(6) UNSIGNED NOT NULL,
                idRuangan INT(6) UNSIGNED NOT NULL,
                pelaksanaKegiatan VARCHAR(50) NOT NULL,
                namaKegiatan VARCHAR(50) NOT NULL,
                waktu DATE NOT NULL,
                disetujui BOOLEAN NOT NULL DEFAULT FALSE,
                FOREIGN KEY (idPeminjam) REFERENCES pengguna (id),
                FOREIGN KEY (idRuangan) REFERENCES ruangan (id)
            );
        ";

        if($conn->query($sql) === TRUE)
            echo "Tabel peminjaman telah dibuat";
        else 
            echo "Kesalahan dalam membuat tabel peminjaman : " . $conn->error;

        

        $conn->close();

    }

    function table_drop(){
        $conn = db_connect();

        $sql = "DROP TABLE `peminjaman`, `pengguna`, `ruangan`;";

        if($conn->query($sql) === TRUE)
            echo "Tabel telah dihapus";
        else 
            echo "Terjadi kesalahan: " . $conn->error;
    }


    function table_fill(){
        $conn = db_connect();

        fillRuangan($conn);
        fillPengguna($conn);
        fillPeminjaman($conn);

        $conn->close();
    }

    function fillRuangan($conn){
        $sql = "
            INSERT INTO ruangan (nomorRuangan, gedung) VALUES 
        ";

        $ruangan_f = "";
        for($i = 1; $i <= 3; $i++){
            for($j = 1; $j <= 8; $j++){
                $ruangan_f = $ruangan_f . "('$i.$j', 'F'), ";
            }
        }

        $sql = $sql . $ruangan_f." ('2.9', 'F');";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    function fillPengguna($conn){
        $sql = "
            INSERT INTO pengguna (nomorInduk) VALUES ('205150207111006')
        ";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function fillPeminjaman($conn){
        $sql = "
            INSERT INTO peminjaman (
                idPeminjam, 
                idRuangan, 
                pelaksanaKegiatan, 
                namaKegiatan, 
                waktu
            ) 
            VALUES (
                (SELECT id FROM pengguna WHERE nomorInduk = '205150207111006'), 
                (SELECT id FROM ruangan WHERE nomorRuangan = '2.2'), 
                'Ahmad R. H.', 
                'Study Session', 
                '2022-1-4'
            ),
            

        ";

        for($i=1; $i<=3; $i++){
            for($j=1; $j <=6; $j++){
                $sql = $sql . "(
                    (SELECT id FROM pengguna WHERE nomorInduk = '205150207111006'), 
                    (SELECT id FROM ruangan WHERE nomorRuangan = '$i.$j'), 
                    'Ahmad R. H.', 
                    'Dummy Session', 
                    '2022-1-4'
                ), ";
            }
        }

        $sql = $sql . "(
            (SELECT id FROM pengguna WHERE nomorInduk = '205150207111006'), 
            (SELECT id FROM ruangan WHERE nomorRuangan = '2.9'), 
            'Ahmad R. H.', 
            'Dummy Session', 
            '2022-1-4'
        );";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }

?>