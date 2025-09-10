<?php

#membuat koneksi
include("../koneksi.php");

#mengambil value id hapus
$id = $_GET["id"];

#menjalankan query hapus 
$qry = mysqli_query($koneksi,"DELETE FROM poli WHERE Poli_ID = '$id'");

#mengalihkan halaman jika sudah terhapus
header("location:index.php");
?>