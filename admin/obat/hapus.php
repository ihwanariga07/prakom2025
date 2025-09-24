<?php

#membuat koneksi
include("../koneksi.php");

#mengambil value id hapus
$id = $_GET["id"];

#menjalankan query hapus 
$qry = mysqli_query($koneksi,"DELETE FROM berobat WHERE No_Transaksi = '$id'");

#mengalihkan halaman jika sudah terhapus
header("location:index.php");
?>