<?php 
###### PROSES TAMBAH DATA ######
#1. koneksi ke database
include("../koneksi.php");

#2. mengambil value dari input form
$nama = $_POST["nama"]; // <-- sesuaikan dengan name di form.php

#3. query tambah data ke tabel
$qry = mysqli_query($koneksi, "INSERT INTO poli (Nama_Poli) VALUES ('$nama')");

#4. cek apakah query berhasil
if ($qry) {
    # sukses
    header("Location: index.php");
    exit;
} else {
    # gagal
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
