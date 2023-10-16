<?php
require 'function.php';

$id = $_GET['id'];
$n = query("SELECT * FROM novel WHERE id = $id")[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (ubah($_POST) > 0) {
    echo "<script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
              </script>";
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <title>BukuKu | Form Tambah Data Buku</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">BukuKu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="tambah.php">Tambah Buku</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h2>Form Tambah Data Buku</h2>
      </div>
    </div>


    <div class="row">
      <div class="col-md-6">


        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $n['id'] ?>">
          <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $n['judul'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $n['penulis'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $n['penerbit'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="<?= $n['kategori'] ?>" required>
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value="<?= $n['gambar'] ?>" required>
          </div>

          <button type="submit" class="btn btn-primary">Ubah Data Buku</button>
        </form>


      </div>
    </div>

  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>