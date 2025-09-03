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
            <a href="" class="btn btn-primary">Tambah</a>
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
                ?>
                <tr>
                  <th scope="row"><?=$nomor++?></th>
                  <td><?=$row['Nama_pasienKliniK']?></td>
                  <td><?=$row['Tanggal_LahirPasien']?></td>
                  <td><?=$row['Jenis_KelaminPasien']?></td>
                  <td><?=$row['Alamat_Pasien']?></td>
                  <td>
                    <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-pen"></i></a>
                  </td>    
                  <td>
                    <a href="" class="btn btn-info btn-sm"><i class="fa-solid fa-trash"></i></a>
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
