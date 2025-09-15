<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat - Tambah Data Berobat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #67C090;">
    <?php include('../navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-10 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <a href="index.php" class="btn btn-sm btn-secondary">← Kembali</a>
                        <b>Form Tambah Data Berobat</b>
                    </div>
                    <div class="card-body">
                        <form method="post" action="proses_tambah.php">
                            <div class="mb-3">
                                <label class="form-label">No Transaksi</label>
                                <input name="no_transaksi" type="text" class="form-control" placeholder="Masukkan No Transaksi" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Berobat</label>
                                <input name="tgl_berobat" type="date" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Pasien</label>
                                <select name="pasien_id" class="form-select" required>
                                    <option value="" selected disabled>Pilih Pasien</option>
                                    <?php
                                    include('../koneksi.php');
                                    $pasien = mysqli_query($koneksi, "SELECT pasienKliniK_ID, Nama_pasienKliniK FROM pasien ORDER BY Nama_pasienKliniK ASC");
                                    while ($p = mysqli_fetch_assoc($pasien)) {
                                        echo "<option value='{$p['pasienKliniK_ID']}'>{$p['Nama_pasienKliniK']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Dokter</label>
                                <select name="dokter_id" class="form-select" required>
                                    <option value="" selected disabled>Pilih Dokter</option>
                                    <?php
                                    $dokter = mysqli_query($koneksi, "SELECT Dokter_ID, Nama_Dokter FROM dokter ORDER BY Nama_Dokter ASC");
                                    while ($d = mysqli_fetch_assoc($dokter)) {
                                        echo "<option value='{$d['Dokter_ID']}'>{$d['Nama_Dokter']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keluhan Pasien</label>
                                <textarea name="keluhan" class="form-control" placeholder="Masukkan keluhan pasien" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Biaya Administrasi</label>
                                <input name="biaya" type="number" class="form-control" placeholder="Masukkan biaya administrasi" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
