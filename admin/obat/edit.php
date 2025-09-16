<?php
### Mengambil data berobat berdasarkan ID terpilih ###

#1. membuat koneksi
include("../koneksi.php");

#2. mengambil value ID edit
$id = $_GET["id"];

#3. menjalankan query ambil data berobat
$qry = mysqli_query($koneksi, "SELECT * FROM berobat WHERE No_Transaksi = '$id'");
$row = mysqli_fetch_array($qry);

$transaksi   = $row["No_Transaksi"];
$pasien_id   = $row["PasienKlinik_ID"];
$tanggal     = $row["Tanggal_Berobat"];
$dokter_id   = $row["Dokter_ID"];
$keluhan     = $row["Keluhan_Pasien"];
$biaya       = $row["Biaya_Adm"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klinik Sehat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #67C090;">
  <?php include('../navbar.php'); ?>
  <div class="container">
    <div class="row">
      <div class="col-10 m-auto mt-5">
        <div class="card">
          <div class="card-header">
            <b>Form Edit Data Berobat</b>
          </div>
          <div class="card-body">
            <form method="post" action="proses_edit.php">
              <input type="hidden" name="idedit" value="<?=$transaksi?>">

              <div class="mb-3">
                <label class="form-label">Nama Pasien</label>
                <select name="pasien" class="form-select">
                  <option>Pilih Pasien</option>
                  <?php
                  $qry = mysqli_query($koneksi, "SELECT * FROM pasien");
                  foreach ($qry as $row) {
                      $selected = ($pasienKliniKID == $row['PasienKlinik_ID']) ? "selected" : "";
                      echo "<option $selected value='".$row['PasienKlinik_ID']."'>".$row['Nama_PasienKlinik']."</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Tanggal Berobat</label>
                <input value="<?=$tanggal?>" name="tgl" type="date" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Dokter</label>
                <select name="dokter" class="form-select">
                  <option>Pilih Dokter</option>
                  <?php
                  $q_dokter = mysqli_query($koneksi, "SELECT * FROM dokter");
                  foreach ($q_dokter as $d) {
                      $selected = ($dokter_id == $d['Dokter_ID']) ? "selected" : "";
                      echo "<option $selected value='".$d['Dokter_ID']."'>".$d['Nama_Dokter']."</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Keluhan Pasien</label>
                <textarea name="keluhan" class="form-control"><?=$keluhan?></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Biaya Administrasi</label>
                <input value="<?=$biaya?>" name="biaya" type="number" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
