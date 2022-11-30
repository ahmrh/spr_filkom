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
                mulai VARCHAR(10) DEFAULT '',
                berhenti VARCHAR(10) DEFAULT '',
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

        // ruang f
        $ruangan = "";
        for($i = 1; $i <= 3; $i++){
            for($j = 1; $j <= 8; $j++){
                $ruangan = $ruangan . "('$i.$j', 'F'), ";
            }
        }

        // ruang g
        for($i = 1; $i <= 1; $i++){
            for($j = 1; $j <= 6; $j++){
                $ruangan = $ruangan . "('$i.$j', 'G'), ";
            }
        }

        // ruang gkm
        $ruangan = $ruangan . "('1', 'GKM'), ";
        $ruangan = $ruangan . "('3', 'GKM'), ";
        $ruangan = $ruangan . "('3.1', 'GKM'), ";
        $ruangan = $ruangan . "('4.1', 'GKM'), ";
        $ruangan = $ruangan . "('4.2', 'GKM'), ";
        

        $sql = $sql . $ruangan." ('2.9', 'F');";

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
                (SELECT id FROM ruangan WHERE nomorRuangan = '2.2' AND gedung='F'), 
                'Ahmad R. H.', 
                'Study Session', 
                '2022-01-02'
            ),
            

        ";

        for($i=1; $i<=3; $i++){
            for($j=1; $j <=6; $j++){
                $sql = $sql . "(
                    (SELECT id FROM pengguna WHERE nomorInduk = '205150207111006'), 
                    (SELECT id FROM ruangan WHERE nomorRuangan = '$i.$j' AND gedung='F'), 
                    'Ahmad R. H.', 
                    'Dummy Session', 
                    '2022-01-02'
                ), ";
            }
        }

        $sql = $sql . "(
            (SELECT id FROM pengguna WHERE nomorInduk = '205150207111006'), 
            (SELECT id FROM ruangan WHERE nomorRuangan = '2.9' AND gedung='F'), 
            'Ahmad R. H.', 
            'Dummy Session', 
            '2022-01-02'
        );";

        echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }

?>