<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mewdb1";

//create connection
$conn =mysqli_connect($servername,$username,$password,$dbname);
//check connection
if (!$conn) {
	die("connection failed: " . mysqli_connect_error());
}

//Create table
$sql = "CREATE TABLE buku_tamu(ID_BT INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, NAMA VARCHAR(200) NOT NULL, EMAIL VARCHAR(50) NOT NULL, ISI TEXT)";
if (mysqli_query($conn, $sql)) {
	echo "Database created succesfully";
} else {
	echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>