<?php
#koneksi ke database
include("../koneksi.php");
#mengambil value dari setiap input
$nama = $_POST["nama"];
$tgl = $_POST["tgl"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];


#menuliskan query tambah data ke tabel
$qry = mysql_query("INSERT INTO pasien (Nama_pasienKliniK, Tanggal_LahirPasien, 	Jenis_KelaminPasien	, Alamat_Pasien VALUES ('$nama, $tgl, $jk, $alamat')");

#pengalihan halaman jika proses tambah selesai
header("location:index.php");
?>