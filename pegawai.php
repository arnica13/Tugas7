<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
//Create database
$sql = "CREATE DATABASE db_pegawai";
if (mysqli_query($conn, $sql)){
    echo "Berhasil Membuat Database Pegawai..........";
}else{
    echo "Error creating database:".mysqli_error($conn);
}

// Create table pegawai
mysqli_select_db($conn, "db_pegawai");
$sql = "CREATE TABLE tb_pegawai (
    Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nama VARCHAR(50) NOT NULL,
    Alamat VARCHAR(100) NOT NULL,
    Email  VARCHAR(100) NOT NULL,
    Gender ENUM('Laki-laki', 'Perempuan') NOT NULL,
    Divisi ENUM('HRD', 'Pemasaran', 'Periklanan', 'Operasional') NOT NULL,
    Jabatan VARCHAR(50)
    )";
if(mysqli_query($conn, $sql)){
    echo "Table Pegawai Berhasil Dibuat...";
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>