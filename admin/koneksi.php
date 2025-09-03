<?php
$host     = "localhost";  // server database (biasanya localhost)
$user     = "root";       // username MySQL (default: root)
$password = "";           // password MySQL (default: kosong di XAMPP)
$dbname   = "wanklinik"; // ganti dengan nama database kamu

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
