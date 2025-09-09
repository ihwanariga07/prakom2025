<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prakom 2025</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body style="background-color: #67C090">
  <?php
  include('../navbar.php');
  ?>

  <div class="container">
    <div class="row">
      <div class="col-10 m-auto mt-5">
        <div class="card">
          <div class="card-header">
            Klinik Sehat
          </div>
          <div class="card-body">
            <a href="/prakom2025/admin/pasien/form.php" class="btn btn-primary">Tambah</a>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                #koneksi
                include('../koneksi.php');
                #menuliskan query
                $qry = "SELECT * FROM pasien";

                #menjalankan query
                $result = mysqli_query($koneksi, $qry);

                # melakukan looping data pasien
                $nomor = 1;
                foreach ($result as $row) {
                                    $tgl_lahir = date_create($row['Tanggal_LahirPasien']);
                                    $tgl_lahir = date_format($tgl_lahir, 'd F Y')
                                    ?>
                <tr>
                  <th scope="row"><?=$nomor++?></th>
                  <td><?=$row['Nama_pasienKliniK']?></td>
                  <td><?= $tgl_lahir ?></td>
                  <td><?=$row['Jenis_KelaminPasien']?></td>
                  <td><?=$row['Alamat_Pasien']?></td>
                  <td>
                    <a href="edit.php?id=<?=$row['pasienKliniK_ID']?>" class="btn btn-success btn-sm" ><i class="fa-solid fa-pen"></i></a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" <?=$row['pasienKliniK_ID']?>><i class="fa-solid fa-trash"></i>
                    </button>
                    <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <div class="modal-body">
                          Anda Yakin Ingin Menghapus Data <b><?=$row['Nama_pasienKliniK']?></b>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <a href="hapus.php?id=<?=$row['pasienKliniK_ID']?>" type="button" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  </td>    
                  
                </tr>
                  <?php
                   }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- Bootstrap JS -->
</body>
</html>
