<?php
// Koneksi ke mySQL & Memilih DB
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_a_213040053') or die('Koneksi ke database GAGAL!!!');

  return $conn;
}

// Query untuk mengambil seluruh isi dari tabel novel
function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die('Koneksi ke database GAGAL!!!' . mysqli_error($conn));

  // Looping untuk mengambil setiap data buku satu per satu
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  // Initialize variables with default values
  $judul = '';
  $penulis = '';
  $penerbit = '';
  $kategori = '';
  $gambar = '';

  // Check if the keys exist in the $data array before accessing them
  if (isset($data['judul'])) {
    $judul = mysqli_real_escape_string($conn, htmlspecialchars($data['judul']));
  }
  if (isset($data['penulis'])) {
    $penulis = mysqli_real_escape_string($conn, htmlspecialchars($data['penulis']));
  }
  if (isset($data['penerbit'])) {
    $penerbit = mysqli_real_escape_string($conn, htmlspecialchars($data['penerbit']));
  }
  if (isset($data['kategori'])) {
    $kategori = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori']));
  }
  if (isset($data['gambar'])) {
    $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));
  }

  // Prepare the query to insert data
  $query = "INSERT INTO novel
                VALUES (null, '$judul', '$penulis', '$penerbit', '$kategori', '$gambar')
                ";

  // Insert data into the 'novel' table
  mysqli_query($conn, $query) or die('Query GAGAL!!! ' . mysqli_error($conn));

  // Return the success value
  return mysqli_affected_rows($conn);
}


function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM novel WHERE id = $id") or die('Query GAGAL! ' . mysqli_error($conn));

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  // sanitasi data 
  $id = $data['id'];
  $judul = mysqli_real_escape_string($conn, htmlspecialchars($data['judul']));
  $penulis = mysqli_real_escape_string($conn, htmlspecialchars($data['penulis']));
  $penerbit = mysqli_real_escape_string($conn, htmlspecialchars($data['penerbit']));
  $kategori = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori']));
  $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));


  //siapkan query update data 
  $query = "UPDATE novel 
                SET
                judul = '$judul',
                penulis = '$penulis',
                penerbit = '$penerbit',
                kategori = '$kategori',
                gambar = '$gambar'
                    WHERE id = $id 
                ";

  // update data dari tabel buku
  mysqli_query($conn, $query) or die('Query GAGAL! ' . mysqli_error($conn));

  // kembalikan nilai keberhasilannya
  return mysqli_affected_rows($conn);
}
