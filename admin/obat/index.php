<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prakom 2025</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body style="background-color: #67C090">
  <?php include('../navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-12 m-auto mt-5">
        <div class="card">
          <div class="card-header">
            Klinik Sehat
          </div>
          <div class="card-body">
            <a href="/prakom2025/admin/obat/form.php" class="btn btn-primary mb-3">Tambah</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>No Transaksi</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Berobat</th>
                    <th>Usia</th>
                    <th>Jenis Kelamin</th>
                    <th>Keluhan</th>
                    <th>Nama Poli</th>
                    <th>Dokter</th>
                    <th>Biaya Administrasi</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('../koneksi.php');
                $qry = "SELECT * FROM berobat 
                INNER JOIN pasien ON berobat.PasienKlinik_ID=pasien.pasienKlinik_ID
                INNER JOIN dokter ON berobat.Dokter_ID=dokter.Dokter_ID
                INNER JOIN poli ON dokter.Poli_ID=poli.Poli_ID";

                 #3. menjalankan query
                $result = mysqli_query($koneksi, $qry);

                #4. melakukan looping data Dokter
                $nomor = 1;
                foreach ($result as $row) {
                     //memformat ulang tanggal berobat
                     $tgl_berobat = date_create($row['Tanggal_Berobat']);
                     $tgl_berobat = date_format($tgl_berobat, 'd/m/Y');

                    //membuat usia pasien
                    $tanggal_lahir = new DateTime($row['Tanggal_LahirPasien']);
                    $sekarang = new DateTime("today");
                    $usia = $sekarang->diff($tanggal_lahir)->y;
                    ?>

                <tr>
                <td><?= $row['No_Transaksi'] ?></td>
                <td><?= $row['Nama_pasienKliniK'] ?></td>
                <td><?= date('d-m-Y', strtotime($row['Tanggal_Berobat'])) ?></td>
                <td><?= $usia ?></td>
                <td><?= $row['Jenis_KelaminPasien'] ?></td>
                <td><?= $row['Keluhan_Pasien'] ?></td>
                <td><?= $row['Nama_Poli'] ?></td>
                <td><?= $row['Nama_Dokter'] ?></td>
                <td><?= number_format($row['Biaya_Adm'], 0, ',', '.') ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['No_Transaksi'] ?>" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="hapus.php?id=<?= $row['No_Transaksi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
                    <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
                </tr>
            <?php } ?>
            </tbody>


                </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
