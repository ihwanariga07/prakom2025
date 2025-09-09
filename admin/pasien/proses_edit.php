<?php
#membuat koneksi
include("../koneksi.php");

#mengambil value dari setiap input
$id = $_POST["$id"];
$nama = $_POST["nama"];
$tgl_lahir = $_POST["tgl"];
$jk = $_POST["jk"];
$alamat = $_POST["alamat"];

#menuliskan query tambah data ke tabel
$qry = mysqli_query($koneksi,"UPDATE pasien SET Nama_pasienKlinik='$nama', 
Tanggal_LahirPasien='$tgl_lahir',Jenis_KelaminPasien='$jk', Alamat_Pasien='$alamat' 
WHERE pasienKlinik_ID='$id'");
#pengalihan halaman jika proses selesai
header("location:index.php");

?>