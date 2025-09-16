<?php
$host     = "localhost";  
$user     = "root";      
$password = "";           
$dbname   = "wanklinik";

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
