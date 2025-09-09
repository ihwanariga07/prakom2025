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
      <div class="col-10 m-auto mt-5">
        <div class="card">
          <div class="card-header">
            Klinik Sehat
          </div>
          <div class="card-body">
            <a href="/prakom2025/admin/poli/form.php" class="btn btn-primary mb-3">Tambah</a>
            <table class="table table-bordered">
              <thead class="table-light">
                <tr>
                  <th scope="col" style="width:50px">#</th>
                  <th scope="col">Nama Poli</th>
                  <th scope="col" style="width:150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                # koneksi
                include('../koneksi.php');

                # query
                $qry = "SELECT * FROM poli";
                $result = mysqli_query($koneksi, $qry);

                $no = 1;
                while($row = mysqli_fetch_assoc($result)) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row['Nama_Poli']; ?></td>
                  <td>
                    <!-- Tombol Edit -->
                    <a href="edit.php?id=<?= $row['Poli_ID'] ?>" class="btn btn-success btn-sm">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    
                    <!-- Tombol Hapus (pakai modal) -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['Poli_ID']; ?>">
                      <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapus<?= $row['Poli_ID']; ?>" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            Anda yakin ingin menghapus data <b><?= $row['Nama_Poli']; ?></b>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="" class="btn btn-danger">Hapus</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>    
                </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
