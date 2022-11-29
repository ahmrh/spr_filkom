<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";

    

    function connect(){

        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
    }
    
    function create_db(){
        connect();

        $sql = "CREATE DATABASE spr_db";
        if ($conn->query($sql) === TRUE) {
            echo "Database berhasil dibuat";
        } else {
            echo "Terjadi kesalahan : " . $conn->error;
        }

        $conn->close();
    }
?>