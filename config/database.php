<?php
    function db_connect($database = ""){
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
        $conn = db_connect();

        $sql = "CREATE DATABASE IF NOT EXISTS spr_db";
        if ($conn->query($sql) === TRUE) {
            echo "Database berhasil dibuat";
        } else {
            echo "Terjadi kesalahan : " . $conn->error;
        }

        $conn->close();
    }

    function table_create(){
        $conn = db_connect("spr_db");

        $sql = "
            CREATE TABLE IF NOT EXISTS peminjaman (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                pelaksanaKegiatan VARCHAR(50) NOT NULL,
                namaKegiatan VARCHAR(50) NOT NULL,
                waktu DATE NOT NULL,
                disetujui BOOLEAN NOT NULL DEFAULT FALSE
            );
        ";

        if($conn->query($sql) === TRUE)
            echo "Tabel peminjaman telah dibuat";
        else 
            echo "Kesalahan dalam membuat tabel peminjaman : " . $conn->error;

        
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

        
        $sql = "
            CREATE TABLE IF NOT EXISTS pengguna (
                nomorInduk INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                isAdmin BOOLEAN NOT NULL DEFAULT FALSE,
                state VARCHAR(10) NOT NULL
            )
        ";

        if($conn->query($sql) === TRUE)
            echo "Tabel pengguna telah dibuat";
        else 
            echo "Kesalahan dalam membuat tabel pengguna : " . $conn->error;
        

        $conn->close();

    }
?>